<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect route from / page.
     * If user is admin, redirect to admin dashboard.
     * If not, user dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirect()
    {

        // get user
        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } else {

            return redirect($user->getDashboardRoute());
        }
    }

    /**
     * Overwrite parent method.
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {


        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // check additionally for email confirmation, redirect with info
        // if there is such user
        if ($user = User::where('email', $request->email)->first()) {
            $user->update([
                'last_seen' => Carbon::now(),
            ]);
            // if user's email is not confirmed and there is confirmation code
            if (!$user->confirmed && $user->confirmation_code) {
                return view('auth.not_confirmed', ['email' => $request->email]);
            }

            // if user's company has expired, flash error and redirect back
            if (!$this->isWithValidAccount($user)) {

                flash('Your account has expired.')->error()->important();
                return redirect()->route('login');
            }


        }

        if ($this->attemptLogin($request)) {

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);



        return $this->sendFailedLoginResponse($request);
    }

    /**
     * User is valid when associated with him company is not expired.
     * Admins don't have companies, they are valid as well.
     *
     * @param User $user
     * @return bool
     */
    protected function isWithValidAccount(User $user)
    {
        return !! optional($user->memberOfAccount)->isActive || $user->isAdmin();
    }
}
