<?php

namespace App\Model\Finance;

use App\Companies;
use App\Model\Sales\SalesOrders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cheques extends Model
{
    protected $guarded = [];

    protected $dates = ["payment_date", "date"];

    public function company(){
        return $this->hasOne(Companies::class,"id","company_id");
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

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = date_convert($value);
    }

    public function getPaymentDateAttribute()
    {
        $explode = explode("-", $this->attributes["payment_date"]);
        $dt = Carbon::create($explode[0], $explode[1], $explode[2]);
        return $dt->format("d.m.Y");
    }

    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = money_db_format($amount);
    }

    public function getAmountAttribute()
    {
        return get_money($this->attributes["amount"]);
    }

    public function orders()
    {
        return $this->morphedByMany(SalesOrders::class, 'bankabble')->withPivot("amount");
    }

    public function getRemainingAttribute()
    {
        $used = $this->orders->sum("pivot.amount");
        $total = money_db_format($this->amount);

        $general_total = get_money($total - $used);

        return $general_total;
    }

    public function collect(){
        return $this->hasOne(BankItems::class,"cheque_id","id");
    }

    public function getCollectStatuAttribute(){
        $collect =  $this->collect;

        if($collect == null){
            return 0;
        }else{
            return 1;
        }

    }

}
