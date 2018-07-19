<?php

namespace App\Model\Sales;

use Illuminate\Database\Eloquent\Model;

class WaybillItems extends Model
{
    protected $guarded = [];
    public $timestamps = false;


    public function order_item(){
        return $this->hasOne(SalesOrderItems::class,"id","order_item_id");
    }
}
