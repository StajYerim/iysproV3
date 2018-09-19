<?php

namespace App\Http\Controllers\Auth;

use App\Account;
use App\Events\AccountRegistration;
use App\Mail\ConfirmationCode;
use App\Model\Finance\BankAccounts;
use App\Role;
use App\Sector;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Overwrites parent method.
     * Adds sectors variable for view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $sectors = Sector::all();

        return view('auth.register', [
            'sectors' => $sectors
        ]);
    }

    /**
     * Overwrites parent method.
     * Denies auto login.
     * Returns page with registration confirmation.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        event(new AccountRegistration($user));

        return view('auth.register-confirmation', [
            'user' => $user
        ]);
    }

    /**
     * Checks users for confirmation.
     * Confirm user if found.
     *s
     * @param string $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activateByCode(string $code)
    {
        // if there is a user
        if ($user = User::where('confirmation_code', $code)->first()) {
            // and if user has a password already, just confirm
            if ($user->password) {
                $user->confirmed = True;
                $user->confirmation_code = Null;
                $user->save();

                // flash success, password is in place and account confirmed
                flash('Emailiniz başarıyla onaylandı.')->success();
            } else { // in other case, redirect to form with password setup
                return view('auth.password_setup', [
                    'user' => $user,
                    'code' => $code
                ]);
            }
        } else { // Incorrect confirmation code, flash error
            flash('Incorrect confirmation code.')->error();
        }

        // in any flash case, redirect to login page
        return redirect()->route('login');
    }

    /**
     * Invited not confirmed users post their password.
     * We confirm their email and set password for them.
     *
     * @param Request $request
     * @param string $code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activateWithPassword(Request $request, string $code)
    {
        // validate user's input
        $validated = $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'code' => 'required|string|exists:users,confirmation_code'
        ]);

        // knowing that code exists, find its user
        $user = User::where('confirmation_code', $validated['code'])->first();

        // setup password
        $user->password = bcrypt($validated['password']);
        $user->confirmed = True;
        $user->confirmation_code = Null;
        $user->save();

        // redirect to login page
        flash('Şifrenizi başarıyla belirlediniz. Hesabınız aktif edildi. Giriş yapabilirsiniz.');
        return redirect()->route('login');
    }

    /**
     * Resend confirmation code for user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resendCode(Request $request)
    {
        // validate email
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // get user
        $user = User::where('email', $validated['email'])->first();

        // resend confirmation code
        Mail::to($user->email)->send(new ConfirmationCode($user));

        flash('Email aktivasyonunuz yeniden mail adresinize gönderildi.')->success();
        return redirect()->route('login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|string|max:255',
            'sector' => 'required|exists:list_sectors,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => str_random(32),
            'role_id' => Role::ACCOUNT_OWNER,
            'lang_id' => 1 // TODO: language must be checked with locale. Be default it is English.
        ]);

        $account = Account::create([
            'company_name' => $data['company_name'],
            'sector_id' => $data['sector'],
            'owner_id' => $user->id,
            'expiry_date' => Carbon::now()->addMonth()
        ]);
        $account->units()->attach(1);
        $account->units()->attach(20);
        $user->account_id = $account->id;
        $user->save();

        BankAccounts::create([
            "account_id" => $account->id,
            "name" => "KASA HESABI",
            "type" => 1,
            "currency" => "TRY",
        ]);

        // Modules Activated
        $account = Account::find($account->id);
        $account->update(["modules" => "[1,2,5,11,17,23,27]"]);


        return $user;
    }
}
