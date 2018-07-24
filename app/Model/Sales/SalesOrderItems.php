<?php

namespace App\Model\Sales;

use App\Model\Stock\Product\Product;
use App\Model\Stock\Stock;
use App\Model\Stock\StockItems;
use App\Units;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use \NumberFormatter;

class SalesOrderItems extends Model
{
    protected $guarded = [];
    protected $dates = ["termin_date"];
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

    public function getQuantityAttribute(){
        return get_money($this->attributes["quantity"]);

    }

    public function getTerminShowAttribute(){
        return $this->attributes["termin_show"] == 0 ? false:true;
    }

    public function getTerminDateAttribute(){
        if($this->attributes["termin_show"] != null){
            $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["termin_date"]);
        return $dt->format("Y-m-d");
        }
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

    public function getOnlyPriceAttribute()
    {
        return get_money(money_db_format($this->price)*money_db_format($this->quantity));
    }

    public function waybill_item()
    {
        return $this->hasOne( StockItems::class,"sales_order_item_id","id");
    }





}
