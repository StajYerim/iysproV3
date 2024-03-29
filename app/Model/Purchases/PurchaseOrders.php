<?php

namespace App\Model\Purchases;

use App\Companies;
use App\Currency;
use App\Model\Finance\BankItems;
use App\Model\Finance\Cheques;
use App\Model\Sales\SalesOfferItems;
use App\Tags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PurchaseOrders extends Model
{

    protected $guarded = [];

    protected $dates = ["date", "due_date"];
    protected $appends = ["currency_icon"];


    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }

    public function getDescriptionsAttribute()
    {
        return $this->description == "" ? "SATIN ALMA SİPARİŞİ" : $this->description;
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

    public function getDiscountValueAttribute()
    {
        return get_money($this->attributes['discount_value']);
    }

    public function setDiscountValueAttribute($value)
    {
        $this->attributes['discount_value'] = money_db_format($value);
    }

    public function getDatemAttribute()
    {
        return $this->attributes["date"];
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = date_convert($value);
    }

    public function getDueDateAttribute()
    {
        if($this->attributes["due_date"] == null){
            return "BİLİNMİYOR";
        }else{
            $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["due_date"]);
            return $dt->format("d.m.Y");
        }

    }

    public function setGrandTotalAttribute($value)
    {
        $this->attributes['grand_total'] = money_db_format($value);
    }

    public function setSubTotalAttribute($value)
    {
        $this->attributes['sub_total'] = money_db_format($value);
    }

    public function setVatTotalAttribute($value)
    {
        $this->attributes['vat_total'] = money_db_format($value);
    }

    public function setCurrencyValueAttribute($value)
    {
        $this->attributes['currency_value'] = money_db_format($value);
    }

    public function getGrandTotalAttribute()
    {
        return get_money($this->attributes['grand_total']);
    }

    public function getSubTotalAttribute()
    {
        return get_money($this->attributes['sub_total']);
    }

    public function getVatTotalAttribute()
    {
        return get_money($this->attributes['vat_total']);
    }

    public function getCurrencyValueAttribute()
    {
        return get_money($this->attributes['currency_value'], 4);
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItems::class, "purchase_order_id", "id");
    }

    public function company()
    {
        return $this->hasOne(Companies::class, "id", "company_id");
    }

    public function getTlConvertAttribute()
    {
        return get_money(money_db_format($this->grand_total) * money_db_format($this->currency_value));
    }

    public function getStatusAttribute()
    {
        if($this->remaining == $this->grand_total){
            return "ÖDENMEDİ";
        }elseif($this->remaining == "0,00"){
            return "ÖDENDİ";
        }else{
            return "KISMİ ÖDENDİ";
        }
    }

    public function getCurrencyIconAttribute(){

        return  currency_symbol($this->currency);

    }

    public function getCurrencyNameAttribute(){
        $currencies = Currency::All();
        foreach($currencies as $cur){
            if(strtoupper($cur->code) === strtoupper($this->currency)){
                return strtoupper($cur->name);
            }
        }
    }

    public function payments()
    {
        return $this->morphToMany(BankItems::class, 'bankabble')->withPivot('amount');
    }

    public function cheques()
    {
        return $this->morphToMany(Cheques::class, 'bankabble')->withPivot('amount');
    }

    public function getRemainingAttribute()
    {
        $pay = $this->payments->sum("pivot.amount");
        $cheq = $this->cheques->sum("pivot.amount");
        $total = $pay+$cheq;

        return get_money((money_db_format($this->grand_total) - $total));
    }

    public function getSafeRemainingAttribute()
    {
        $pay = $this->payments->sum("pivot.amount");
        $cheq = $this->cheques->sum("pivot.amount");
        $total = $pay+$cheq;

        return (money_db_format($this->grand_total) - $total);
    }

    public function tags()
    {
        return $this->morphToMany(Tags::class, 'taggable');
    }

    public function getFaCurrencyAttribute(){
        return strtolower($this->currency);
    }

    public function getPaymentLabelAttribute()
    {
        if($this->remaining == "0,00"){
            return '<span class="label label-success">ÖDENDİ</span>';
        }else if($this->remaining == $this->grand_total){
            return '<span class="label label-danger">ÖDENMEDİ</span>';
        }else{
            return '<span class="label label-primary">KISMİ ÖDENDİ</span>';
        }
    }




}
