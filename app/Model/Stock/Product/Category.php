<?php

namespace App\Model\Stock\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where("account_id", '=', aid());
    }

    public function products()
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }

    public function getTotalOrderAttribute()
    {
        $total = 0;

        foreach ($this->products as $product)
        {
            $total += $product->order_items()->sum("total");
        }

        return get_money($total);
    }


    public function getTotalOrderSafeAttribute()
    {
        $total = 0;

        foreach ($this->products as $product)
        {
            $total += $product->order_items()->sum(DB::raw('quantity * price'));

        }

        return get_money($total);


    }

    public function getTotalPurchaseOrderAttribute()
    {
        $total = 0;

        foreach ($this->products as $product)
        {
            $total += $product->porder_items()->sum("total");
        }

        return get_money($total);
    }


    public function getTotalPurchaseOrderSafeAttribute()
    {
        $total = 0;

        foreach ($this->products as $product)
        {
            $total += $product->porder_items()->sum(DB::raw('quantity * price'));

        }

        return get_money($total);


    }
}
