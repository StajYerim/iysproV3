<?php

namespace App\Model\Stock;

use App\Model\Stock\Product\Product;
use Illuminate\Database\Eloquent\Model;

class StockItems extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = money_db_format($value);
    }

    public function getQuantityAttribute(){
        return get_money($this->attributes["quantity"]);

    }


    public function product(){
        return $this->hasOne(Product::class,"id","product_id");
    }

    public function receipt(){
        return $this->hasOne(Stock::class);
    }
}
