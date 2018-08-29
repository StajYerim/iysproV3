<?php

namespace App\Model\Sales;

use App\Currency;
use App\Model\Stock\Product\Product;
use App\Units;
use Illuminate\Database\Eloquent\Model;

class SalesOfferItems extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = money_db_format($value);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = money_db_format($value);
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = money_db_format($value);
    }

    public function getOnlyPriceAttribute()
    {
        return get_money(money_db_format($this->price)*money_db_format($this->quantity));
    }

    public function getQuantityAttribute(){

        $a = new \NumberFormatter("tr-TR", \NumberFormatter::DECIMAL);
        $a->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 0);
        $a->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 2); // by default some locales got max 2 fraction digits, that is probably not what you want
        return $a->format($this->attributes["quantity"]);

    }

    public function getPriceAttribute(){
        return get_money($this->attributes["price"]);
    }

    public function getTotalAttribute(){
        return get_money($this->attributes["total"]);
    }

    public function product(){
        return $this->hasOne(Product::class,"id","product_id");
    }

    public function unit(){
        return $this->hasOne(Units::class,"id","unit_id");
    }


}
