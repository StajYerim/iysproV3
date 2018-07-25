<?php

namespace App\Model\Stock;

use App\Model\Purchases\PurchaseOrderItems;
use App\Model\Sales\SalesOrderItems;
use App\Model\Stock\Product\Product;
use App\Units;
use Illuminate\Database\Eloquent\Model;

class StockItems extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $appends = ['order_item',"quantitys"];

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = money_db_format($value);
    }

    public function getQuantityAttribute(){
        return get_money($this->attributes["quantity"]);

    }

    public function getQuantitysAttribute(){
        return $this->attributes["quantity"];

    }


    public function product(){
        return $this->hasOne(Product::class,"id","product_id");
    }

    public function receipt(){
        return $this->hasOne(Stock::class,"id","stock_id");
    }

    public function unit(){
        return $this->hasOne(Units::class,"id","unit_id");
    }

    public function purchase_order()
    {
        return $this->hasOne(PurchaseOrderItems::class, "id", "purchase_order_item_id");
    }

    public function sales_order()
    {
        return $this->hasOne(SalesOrderItems::class, "id", "sales_order_item_id");
    }

    public function getOrderItemAttribute()
    {
        if ($this->sales_order_item_id != null) {
            return $this->sales_order;
        } elseif ($this->purchase_order_item_id != null) {
            return $this->purchase_order;
        } else {
            return "se";
        }

    }
}
