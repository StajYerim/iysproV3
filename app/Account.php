<?php

namespace App;

use App\Model\Finance\BankAccounts;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * Set table's name for Account model.
     *
     * @var string
     */
    protected $table = 'app_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'company_name', 'sector_id', 'owner_id', 'expiry_date'
//    ];

    protected $guarded = [];

    /**
     * The attributes that are dates.
     *
     * @var array
     */
    protected $dates = ['expiry_date'];

    /**
     * Return owner of account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }






    /**
     * Company or Account has many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'account_id');
    }

    public function modules()
    {

    }

    /**
     * Account belongs to one of defined sector.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    /**
     * Check whether account not expired yet.
     *
     * @return bool
     */
    public function getIsActiveAttribute()
    {
        return $this->expiry_date > Carbon::now();
    }

    /**
     * Get count of active accounts.
     *
     * @return mixed
     */
    public static function getActiveCountAttribute()
    {
        return Account::where('expiry_date', '>', Carbon::now())->count();
    }

    /**
     * Get count of expired accounts.
     *
     * @return mixed
     */
    public static function getExpiredCountAttribute()
    {
        return Account::where('expiry_date', '<=', Carbon::now())->count();
    }

    /**
     * Get index route for user's company.
     *
     * @param Account|Null $company
     * @return string
     */
    public static function getProfileRoute(self $company = Null)
    {
        return route('company.profile', ['company' => $company ?: auth()->user()->memberOfAccount]);
    }

    public static function get(self $company = Null)
    {
        return route('company.profile', ['company' => $company ?: auth()->user()->memberOfAccount]);
    }


    public function units()
    {
        return $this->belongsToMany('App\Units',"account_unit","account_id","unit_id","id","id");
    }

}
