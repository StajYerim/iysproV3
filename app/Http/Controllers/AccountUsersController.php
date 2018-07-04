<?php

namespace App\Http\Controllers;

use App\Account;
use App\Events\UserIsInvited;
use App\Language;
use App\Permission;
use App\Role;
use App\User;
use App\UserPermission;
use Illuminate\Http\Request;

class AccountUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Account $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Account $company)
    {
        // get authenticated user's company, then its users
        $users = auth()->user()
            ->memberOfAccount
            ->users()
            ->paginate(50);

        // return view with users
        return view('accountUsers.index', [
            'users' => $users
        ]);
    }

    /**
     * Display listing of the resource for admin.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex()
    {
        // get all users
        $users = User::where('role_id', '!=', Role::ADMIN)
                        ->latest()
                        ->paginate(50);

        // use old same page to show resource list
        return view('accountUsers.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Account $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Account $company)
    {
        $this->authorize('invite', $company);

        return view('accountUsers.form', [
            'languages' => Language::all(),
            'company' => $company
        ]);
    }

    public function invite_create(Account $company)
    {


        return view('modules.settings.users.create', [
            'languages' => Language::all(),
            'company' => $company
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Account $company
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Account $company)
    {
        $this->authorize('invite', $company);

        // Validate user's input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'mobile' => 'nullable|string|max:255',
            'language' => 'required|exists:app_languages,lang_id',
            'company_access' => 'required|exists:permissions,id'
        ]);

        // store user to DB
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'] ?: Null,
            'lang_id' => $validated['language'],
            'role_id' => Role::USER,
            'account_id' => $company->id,
            "permission"=> "[1]",
            'confirmation_code' => str_random(32)
        ]);

        // store chosen permissions for user
        UserPermission::create([
            'user_id' => $user->id,
            'permission_id' => $validated['company_access'],
        ]);

        // fire event, that user has been invited
        event(new UserIsInvited($user));

        // redirect back
        return redirect(User::getIndexRoute());
    }

    public function invite_store(Request $request,$aid)
    {
        $company =  Account::find(aid());

        // Validate user's input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'mobile' => 'nullable|string|max:255',
            'language' => 'required|exists:app_languages,lang_id',
            'company_access' => 'required|exists:permissions,id'
        ]);

        // store user to DB
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'] ?: Null,
            'lang_id' => $validated['language'],
            'role_id' => Role::USER,
            'account_id' => $company->id,
            "permission"=> "[1]",
            'confirmation_code' => str_random(32)
        ]);

        // store chosen permissions for user
        UserPermission::create([
            'user_id' => $user->id,
            'permission_id' => $validated['company_access'],
        ]);

        // fire event, that user has been invited
        event(new UserIsInvited($user));

        // redirect back
        return redirect(User::getIndexRoute());
    }

    public function permission_update (Request $request, $aid,$id)
    {
        $user = User::find($id);
        $moduller = json_decode($user->permissions);
        if (in_array($request->id, $moduller)) {


            $key = array_search($request->id, $moduller);

            if (false !== $key) {
                unset($moduller[$key]);
            }

            User::find($id)->update(["permissions" =>"[".implode(",", $moduller)."]"]);

            return $moduller;


        } else {

            array_push($moduller,$request->id);

            User::find($id)->update(["permissions" =>"[".implode(",", $moduller)."]"]);

            return $moduller;

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $company
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Account $company, User $user)
    {
        // checks permissions for user to update
        $this->authorize('update', $user);

        // return view with user
        return view('accountUsers.form', [
            'languages' => Language::all(),
            'user' => $user,
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Account $company
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Account $company, User $user)
    {
        // checks permissions for user to update
        $this->authorize('update', $user);

        // Validate user's input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'mobile' => 'nullable|string|max:255',
            'language' => 'required|exists:app_languages,lang_id',
            'company_access' => 'nullable|exists:permissions,id'
        ]);

        // update user info
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobile' => $validated['mobile'] ?: Null,
            'lang_id' => $validated['language'],
        ]);

        // if some permissions are given
        if (isset($validated['company_access'])) {

            // check whether user already has this permission
            // if not, delete previous for module
            // grant this permission
            if (!$user->hasPermissions($validated['company_access'])) {
                $user->permissionsRelation->each->delete();

                // store chosen permissions for user
                Permission::grantForUser($validated['company_access'], $user);
            }
        }

        flash('User is updated.')->success();
        return redirect(User::getIndexRoute());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $company
     * @param User $user
     */
    public function destroy(Account $company, User $user)
    {
        //
    }
}
