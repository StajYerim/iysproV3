<?php

namespace App\Model\Stock\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public $timestamps = false;


    public function products()
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }

    public function getTotalOrderAttribute()
    {
        $total = 0;

        //todo:tek satirda kdv hesaplamasi yapilacak
        //$this->products->order_items->

/*        foreach ($this->products as $product)
        {
            $total += $product->order_items()->sum("price")*$product->order_items()->sum("quantity");
        }
*/
        return $total;
    }


    public function getTotalOrderSafeAttribute()
    {
        $total = 0;

        foreach ($this->products as $product)
        {
            $total += $product->order_items()->sum("price")*$product->order_items()->sum("quantity");
        }

        return $total;


    }
}
