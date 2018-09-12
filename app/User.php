<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redis;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'lang_id', 'role_id', 'confirmed', 'confirmation_code', 'account_id',"permissions"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'lang_id', 'role_id', 'mobile'
    ];

    protected $appends = ['lastSeen'];


    /**
     * User has a Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function language(){
        return $this->hasOne(Language::class,"id","lang_id");
    }

    /**
     * Checks whether user is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role_id == Role::ADMIN;
    }

    /**
     * User may own company.
     * Only account owner (roleId = 2) has company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ownsAccount()
    {
        return $this->hasOne(Account::class, 'owner_id');
    }

    /*Last seen*/
    public function getLastSeenAttribute()
    {

        return $this->attributes["last_seen"];
    }

    /**
     * User with roleId = 3 is a member of company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memberOfAccount()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    /**
     * Users has permissions via pivot table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    /**
     * Relational table for user permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissionsRelation()
    {
        return $this->hasMany(UserPermission::class);
    }

    /**
     * Checks whether user has given permissions.
     *
     * @param $permissions
     * @return bool
     */
    public function hasPermissions($permissions)
    {
        // if integer given, make it array for whereIn
        if (!is_array($permissions)) {
            $permissions = [$permissions];
        }

        // return boolean whether user has one of given permissions
        return $this->permissions()
            ->whereIn('permissions.id', $permissions)
            ->get()
            ->isNotEmpty();
    }

    /**
     * Return string representation of dashboard route for user.
     *
     * @return string
     */
    public function getDashboardRoute()
    {
        return route('dashboard', ['company' => $this->memberOfAccount]);
    }

    /**
     * Return count of not confirmed users.
     * Not admins.
     *
     * @return int
     */
    public static function getPendingCount()
    {
        return self::where('confirmed', False)
            ->where('role_id', '!=', Role::ADMIN)
            ->count();
    }

    /**
     * Return count of confirmed users
     * that have not expired company.
     * Not admins.
     *
     * @return int
     */
    public static function getActiveCount()
    {
        return self::where('confirmed', True)
                    ->where('role_id', '!=', Role::ADMIN)
                    ->join('app_accounts', 'users.account_id', '=', 'app_accounts.id')
                    ->where('expiry_date', '>', Carbon::now())
                    ->count();
    }

    /**
     * Return count of confirmed users
     * that have expired company.
     * Not admins.
     *
     * @return int
     */
    public static function getPassiveCount()
    {
        return self::where('confirmed', True)
            ->where('role_id', '!=', Role::ADMIN)
            ->join('app_accounts', 'users.account_id', '=', 'app_accounts.id')
            ->where('expiry_date', '<', Carbon::now())
            ->count();
    }

    /**
     * Get index route for user's company.
     *
     * @param User|Null $user
     * @return string
     */
    public static function getIndexRoute(self $user = Null)
    {
        // admin has own page of index users
        if (auth()->user()->isAdmin()) {
            return route('admin.users.index');
        } else {
            return route('users.index', ['company' => $user ? $user->memberOfAccount : auth()->user()->memberOfAccount]);
        }
    }

    /**
     * Get index route for user's company.
     *
     * @param User|Null $user
     * @return string
     */
    public static function getSettingsRoute(self $user = Null)
    {
        // admin has own page of index users
        if (auth()->user()->isAdmin()) {
            return route('admin.users.index');
        } else {
            return route('settings.index', ['company' => $user ? $user->memberOfAccount : auth()->user()->memberOfAccount]);
        }
    }

    /**
     * Get index route for user's company.
     *
     * @param User|Null $user
     * @return string
     */
    public static function getProductSettingsRoute(self $user = Null)
    {
        // admin has own page of index users
        if (auth()->user()->isAdmin()) {
            return route('admin.users.index');
        } else {
            return route('settings.product', ['company' => $user ? $user->memberOfAccount : auth()->user()->memberOfAccount]);
        }
    }

    /**
     * Get index route for user's company.
     * Differs if admin user.
     *
     * @param User|Null $user
     * @return string
     */
    public static function getMyProfileRoute(self $user = Null)
    {
        if (auth()->user()->isAdmin()) {
            $route = route('admin.myProfile');
        } else {
            $route = route('myProfile', ['company' => $user ? $user->memberOfAccount : auth()->user()->memberOfAccount]);
        }

        return $route;
    }

    /**
     * Get create route for user's company.
     *
     * @param User|Null $user
     * @return string
     */
    public static function getCreateRoute(self $user = Null)
    {
        return route('users.create', ['company' => $user ? $user->memberOfAccount : auth()->user()->memberOfAccount]);
    }

    /**
     * Get store route for user's company.
     *
     * @param User|Null $user
     * @param Account|Null $company
     * @return string
     */
    public static function getStoreRoute(self $user = Null, Account $company = Null)
    {
        return route('users.store', ['company' => $company ?: auth()->user()->memberOfAccount]);
    }

    /**
     * Get edit route for user's company.
     *
     * @param User|Null $user
     * @return string
     */
    public static function getEditRoute(self $user = Null)
    {
        return route('users.edit', ['company' => $user ? $user->memberOfAccount : auth()->user()->memberOfAccount]);
    }


}
