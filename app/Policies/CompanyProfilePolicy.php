<?php

namespace App\Policies;

use App\Account;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Set up module ID for 'Company Profile' module
        $this->module_id = 1;

        // Set up Ids for permissions
        $this->no_access_permission_id = 1;
        $this->view_permission_id = 2;
        $this->edit_permission_id = 3;
    }

    /**
     * It is set that user has no access
     * for Company Profile Module.
     *
     * @param User $user
     * @return bool
     */
    public function noAccess(User $user)
    {
        return
            !! $user->permissions()
                ->where('permissions.id', $this->no_access_permission_id)
                ->first();
    }

    /**
     * It is set that user has view access
     * for Company Profile Module.
     * Owner or special permission (view or edit).
     *
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        return
            !! $user->ownsAccount
            || $user->hasPermissions([$this->view_permission_id, $this->edit_permission_id]);
    }

    /**
     * It is set that user has edit access right
     * for Company Profile Module.
     * Owner or special permission (edit).
     *
     * @param User $user
     * @return bool
     */
    public function edit(User $user)
    {
        return
        !! $user->ownsAccount
        || $user->hasPpermissions($this->edit_permission_id);
    }

    /**
     * Only owner of account or admin can invite users.
     *
     * @param User $user
     * @param Account $model
     * @return bool
     */
    public function invite(User $user, Account $model)
    {
        return
            $user->isAdmin()
            || $user->ownsAccount->id == $model->id;
    }
}
