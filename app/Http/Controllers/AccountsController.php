<?php

namespace App\Http\Controllers;

use App\Account;
use App\Events\AccountRegistration;
use App\Role;
use App\Sector;
use App\User;
use Carbon\Carbon;
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
        return view('admin.accounts.show', [
            'company' => $company
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
