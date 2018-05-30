<?php

namespace App\Model\Finance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BankItems extends Model
{
    protected $guarded = [];
    protected $dates = ["date"];

    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = money_db_format($amount);
    }

    public function getAmountAttribute()
    {
        return get_money($this->attributes["amount"]);
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date_convert($value);
    }

    public function getDateAttribute()
    {
        $explode = explode("-", $this->attributes["date"]);
        $dt = Carbon::create($explode[0], $explode[1], $explode[2]);
        return $dt->format("d.m.Y");
    }

    public function getContactAttribute()
    {
        switch ($this->type) {
            case "account_transfer";
                $bank = BankAccounts::find($this->doc_id);
                return $bank->name;
        }
    }

    public function bank_account()
    {
        return $this->hasOne(BankAccounts::class,"id","bank_account_id");
    }
}
