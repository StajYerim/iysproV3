<?php

namespace App\Model\Finance;

use App\Companies;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cheques extends Model
{
    protected $guarded = [];

    protected $dates = ["payment_date", "date"];
    protected $appends = ["collect_statu","cheque_status"];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where("account_id", '=', aid());
    }

    public function company(){
        return $this->hasOne(Companies::class,"id","company_id");
    }

    public function transfer_company(){
        return $this->hasOne(Companies::class,"id","transfer_company_id");
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date_convert($value);
    }

    public function getDateAttribute()
    {
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["date"]);
        return $dt->format("d.m.Y");
    }

    public function getDatemAttribute()
    {
        return $this->attributes["date"];
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = date_convert($value);
    }

    public function getPaymentDateAttribute()
    {
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["payment_date"]);
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

    public function porders()
    {
        return $this->morphedByMany(PurchaseOrders::class, 'bankabble')->withPivot("amount");
    }

    public function getRemainingAttribute()
    {
        $used = $this->orders->sum("pivot.amount");
        $pused = $this->porders->sum("pivot.amount");
        $total = money_db_format($this->amount);

        $general_total = get_money($total - $used -$pused);

        return $general_total;
    }

    public function collect(){
        return $this->hasOne(BankItems::class,"cheque_id","id");
    }

    public function getCollectStatuAttribute(){
        $collect =  $this->collect;

        if($this->transfer_company != null){
            return 2;
        }elseif($collect == null){
            return 0;
        }else{
            return 1;
        }

    }

    public function getCollectStatusTextAttribute(){
      $type =  $this->collect; //1 giriş  / 0 çıkış

        if($this->cheque_status == 0){
            if($type == null){
                return trans('sentence.payment_will_be_done');
            }else{
                return trans('sentence.payment_completed');
            }
        }else if($this->cheque_status == 1){
            if($type == null){
                return trans('sentence.collection_will_be_done');
            }else{
                return trans('sentence.collection_completed');
            }
        }

    }

    public function getShowButtonAttribute(){
        $type =  $this->collect; //1 giriş  / 0 çıkış

        if($this->cheque_status == 0){
            if($type == null){
                return "verilen0";
            }else{
                return "verilen1";
            }
        }else if($this->cheque_status == 1){
            if($type == null){
                return "alinan0";
            }else{
                return "alinan1";
            }
        }

    }


    public function getChequeStatusAttribute()
    {
        if ($this->company_id != null && $this->transfer_company_id != null) {
            return 2;
        } elseif ($this->company_id != null) {
            return 1;
        } elseif ($this->transfer_company != null) {
            return 0;
        }
    }

    public function getStatusTextAttribute()
    {
        switch ($this->cheque_status) {
            case 0;
                return "Verilen Çek";
                break;
            case 1;
                return "Alınan Çek";
                break;
            case 2;
                return "Alınan, Verilen Çek";
                break;
        }
    }

}
