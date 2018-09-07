<?php

namespace App\Model\Sales;

use App\Companies;
use App\Currency;
use App\Tags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SalesOffers extends Model
{
    protected $guarded = [];
    protected $dates = ["expired_date", "effective_date", "date"];

    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }

    public function getDescriptionsAttribute()
    {
        return $this->description == null ? "SATIŞ TEKLİFİ" : $this->description;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date_convert($value);
    }

    public function getDateAttribute()
    {
        $explode = explode("-", $this->attributes["date"]);
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["date"]);
        return $dt->format("d.m.Y");
    }

    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_date'] = date_convert($value);
    }

    public function getExpiredDateAttribute()
    {
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["expired_date"]);
        return $dt->format("d.m.Y");
    }

    public function setEffectiveDateAttribute($value)
    {
        $this->attributes['effective_date'] = date_convert($value);
    }

    public function getEffectiveDateAttribute()
    {
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["effective_date"]);
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
        return $this->hasMany(SalesOfferItems::class, "sales_offer_id", "id");
    }

    public function company()
    {
        return $this->hasOne(Companies::class, "id", "company_id");
    }

    public function getTlConvertAttribute()
    {
        return get_money(money_db_format($this->grand_total) * money_db_format($this->currency_value));
    }

    public function getFaCurrencyAttribute(){
        return strtolower($this->currency);
    }

    public function getGetStatusAttribute()
    {
        $dizi = array(
            ["id"=>0,  "name"=>"TASLAK"],
            ["id"=>1,  "name"=>"İPTAL EDİLDİ"],
            ["id"=>2,  "name"=>"REDDEDİLDİ"],
            ["id"=>3,  "name"=>"KABUL EDİLDİ"],
            ["id"=>4,  "name"=>"GERİ ÇEKİLDİ"],
            ["id"=>5,  "name"=>"BEKLEMEDE"],
            ["id"=>6,  "name"=>"TEKLİF TALEBİ"]);

        return $dizi;

    }

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 0:
                return "TASLAK";
                break;
            case 1:
                return "İPTAL EDİLDİ";
                break;

            case 2:
                return "REDDEDİLDİ";
                break;
            case 3:
                return "KABUL EDİLDİ";
                break;
            case 4:
                return "GERİ ÇEKİLDİ";
                break;
            case 5:
                return "BEKLEMEDE";
                break;
            case 6:
                return "TEKLİF TALEBİ";
                break;
        }
    }

    public function getStatusColorAttribute()
    {
        switch ($this->status) {
            case 0:
                return "txt-color-teal";
                break;
            case 1:
                return "txt-color-redLight";
                break;
            case 2:
                return "txt-color-red";
                break;
            case 3:
                return "txt-color-green";
                break;
            case 4:
                return "txt-color-blueLight";
                break;
            case 5:
                return "txt-color-blueDark";
                break;
            case 6:
                return "txt-color-orangeDark";
                break;
        }

    }

    public function getStatusColorbgAttribute()
    {
        switch ($this->status) {
            case 0:
                return "bg-color-teal";
                break;
            case 1:
                return "bg-color-redLight";
                break;
            case 2:
                return "bg-color-red";
                break;
            case 3:
                return "bg-color-green";
                break;
            case 4:
                return "bg-color-blueLight";
                break;
            case 5:
                return "bg-color-blueDark";
                break;
            case 6:
                return "bg-color-orangeDark";
                break;
        }

    }

    public function getCurrencyIconAttribute(){

      return  currency_symbol($this->currency);

    }

    public function getCurrencyNameAttribute(){
        $currencies = Currency::All();
        foreach($currencies as $cur){
            if($cur->code === strtoupper($this->currency)){
                return strtoupper($cur->name);
            }
        }
    }

    public function getCurrencyCoinAttribute(){
        $currencies = Currency::All();
        foreach($currencies as $cur){
            if($cur->code === strtoupper($this->currency)){
                return strtoupper($cur->coin);
            }
        }
    }

    public function orders()
    {
        return $this->hasMany(SalesOrders::class, "sales_offer_id", "id");
    }

    public function tags()
    {
        return $this->morphToMany(Tags::class, 'taggable');
    }


}
