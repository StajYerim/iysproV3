<?php

namespace App\Model\Finance;

use App\Currency;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BankAccounts extends Model
{

    protected $guarded = [];
    protected $appends = ["balance"];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where("account_id", '=', aid());
    }

    public function cur_info()
    {
        return $this->hasOne(Currency::class, "code", "currency");
    }

    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }

    public function items()
    {
        return $this->hasMany(BankItems::class,"bank_account_id","id");
    }

    public function getTypeNameAttribute()
    {
        switch ($this->type) {
            case 1:
                return "KASA HESABI";
                break;
            case 2:
                return "BANKA HESABI";
            case 3:
                return "KREDİ HESABI";

        }
    }

    public function getBalanceAttribute(){
       $out = $this->items()->where("action_type",0)->sum("amount");
       $in = $this->items()->where("action_type",1)->sum("amount");

       return get_money($in-$out);
    }
}
