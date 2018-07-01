<?php

namespace App\Model\Finance;

use App\Bankabble;
use App\Companies;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
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

    public function getDatemAttribute()
    {
     return $this->attributes["date"];
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
        return $this->hasOne(BankAccounts::class, "id", "bank_account_id");
    }

    public function company()
    {
        return $this->hasOne(Companies::class, "id", "company_id");
    }

    public function orders()
    {
        return $this->morphedByMany(SalesOrders::class, 'bankabble')->withPivot("amount");
    }

    public function porders()
    {
        return $this->morphedByMany(PurchaseOrders::class, 'bankabble')->withPivot("amount");
    }

    public function bankabble()
    {
        return $this->hasOne(Bankabble::class, "bank_items_id", "id");
    }

    public function getRemainingAttribute()
    {
        $used = $this->orders->sum("pivot.amount");
        $pused = $this->porders->sum("pivot.amount");
        $total = money_db_format($this->amount);
        $general_total = get_money($total - $used-$pused);

        return $general_total;

    }


}