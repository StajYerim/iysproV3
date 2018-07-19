<?php

namespace App\Http\Controllers;

use App\Account;
use App\Events\AccountRegistration;
use App\Menu;
use App\Model\Finance\BankAccounts;
use App\Role;
use App\Sector;
use App\User;
use Carbon\Carbon;
use function MongoDB\BSON\toJSON;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.accounts.index', [
            'companies' => Account::latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view
        return view('admin.accounts.form', [
            'sectors' => Sector::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate user's input
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'sector' => 'required|exists:list_sectors,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:255',
            'expiry_date' => 'nullable|date'
        ]);

        // store user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'confirmation_code' => str_random(32),
            'role_id' => Role::ACCOUNT_OWNER,
            'lang_id' => 1 // TODO: language must be checked with locale. Be default it is English.
        ]);

        // store account for user
        $account = Account::create([
            'company_name' => $validated['company_name'],
            'sector_id' => $validated['sector'],
            'owner_id' => $user->id,
            'expiry_date' => $validated['expiry_date'] ?: Carbon::now()->addMonth() // set or + month
        ]);

        // update user to own account
        $user->account_id = $account->id;
        $user->save();


        BankAccounts::create([
            "account_id" => $account->id,
            "name" => "KASA HESABI",
            "type" => 1,
            "currency" => "try",
        ]);

        //Add default units
        $account->units()->attach(1);
        $account->units()->attach(20);

        // Modules Activated
        $account = Account::find($account->id);
        $account->update(["modules" => "[1,2,3,9,15,21,32,33]"]);


        // send email
        event(new AccountRegistration($user));

        flash('Company is successfully created. Email is sent to user.');
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Account $company
     * @return \Illuminate\Http\Response
     */
    public function show(Account $company)
    {
        $modules = Menu::where("parent_id", null)->where("permission", 2)->get();
        return view('admin.accounts.show', [
            'company' => $company,
            'modules' => $modules,
        ]);
    }

    /**
     * Show company profile.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('admin.accounts.show', [
            'company' => auth()->user()->memberOfAccount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Account $company)
    {
        return view('admin.accounts.form', [
            'company' => $company,
            'sectors' => Sector::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $company)
    {
        // validate user's input
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'sector' => 'required|exists:list_sectors,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,'.$company->owner->email, // it is not duplication if user is the save
            'mobile' => 'required|string|max:255',
            'expiry_date' => 'nullable|date'
        ]);

        // Update company values
        $company->company_name = $validated['company_name'];
        $company->sector_id = $validated['sector'];

        // check for new expire date
        if (isset($validated['expiry_date']))
            $company->expiry_date = $validated['expiry_date'];

        $company->save();

        $user = $company->owner;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->mobile = $validated['mobile'];
        $user->save();

        flash('Company and associated user is updated.')->success();
        return redirect()->route('companies.index');
    }

    public function modules_update(Request $request, $id)
    {
        $company = Account::find($id);
        $moduller = json_decode($company->modules);
        if (in_array($request->id, $moduller)) {


            $key = array_search($request->id, $moduller);
            if (false !== $key) {
                unset($moduller[$key]);
            }

            Account::find($id)->update(["modules" =>"[".implode(",", $moduller)."]"]);

            return $moduller;


        } else {

            array_push($moduller,$request->id);

            Account::find($id)->update(["modules" =>"[".implode(",", $moduller)."]"]);

            return $moduller;

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
