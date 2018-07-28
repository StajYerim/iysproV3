<?php

namespace App\Model\Sales;

use App\Companies;
use App\Currency;
use App\Model\Finance\BankItems;
use App\Model\Finance\Cheques;
use App\Model\Stock\Stock;
use App\Model\Stock\StockItems;
use App\Tags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SalesOrders extends Model
{
    protected $guarded = [];

    protected $dates = ["date", "due_date"];

    protected $appends = ["grand_totals"];


    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }

    public function getDescriptionsAttribute()
    {
        return $this->description == null ? "SATIŞ SİPARİŞİ" : $this->description;
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

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = date_convert($value);
    }

    public function getDueDateAttribute()
    {
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["due_date"]);
        return $dt->format("d.m.Y");
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

    public function getGrandTotalsAttribute()
    {
        return $this->attributes['grand_total'];
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
        return $this->hasMany(SalesOrderItems::class, "sales_order_id", "id");
    }

    public function company()
    {
        return $this->hasOne(Companies::class, "id", "company_id");
    }

    public function getTlConvertAttribute()
    {
        return get_money(money_db_format($this->grand_total) * money_db_format($this->currency_value));
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

    public function offer(){
        return  $this->hasOne(SalesOffers::class,"id","sales_offer_id");
    }

    public function waybills()
    {
        return $this->hasMany(Stock::class, "sales_order_id", "id");
    }

    public function getNoWaybillsAttribute()
    {
        $stok_item = StockItems::select("sales_order_item_id")->get();
        $whereNot = Array();
        foreach($stok_item as $item){
            if($item["sales_order_item_id"] != null)
                array_push($whereNot,$item["sales_order_item_id"]);
        }


        $item =  $this->items()->whereNotIn("id",$whereNot)->get();

        return $item;
    }

    public function invoice(){
        return $this->hasOne(SalesOrderInvoice::class,"sales_order_id","id");
    }

    public function transfers()
    {
        return $this->hasMany(SalesTransferInfo::class, "sales_order_id", "id");
    }

    public function getStatusLabelAttribute()
    {
        if ($this->invoice) {
            return '<span class="label label-success">FATURA EDİLDİ</span>';
        } else {
            return '<span class="label label-warning">AÇIK</span>';
        }
    }

    public function getCollectLabelAttribute()
    {
        if($this->remaining == "0,00"){
            return '<span class="label label-success">ÖDENDİ</span>';
        }else if($this->remaining == $this->grand_total){
            return '<span class="label label-danger">ÖDENMEDİ</span>';
        }else{
            return '<span class="label label-primary">KISMİ ÖDENDİ</span>';
        }
    }



    public function tags()
    {
        return $this->morphToMany(Tags::class, 'taggable');
    }
}
