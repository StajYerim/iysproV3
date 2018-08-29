<?php

namespace App\Model\Sales;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class OrderWaybill extends Model
{
    protected $guarded = [];

    protected $dates = ["edit_date", "dispatch_date"];

    public function setEditDateAttribute($value)
    {
        $this->attributes['edit_date'] = date_convert($value);
    }

    public function getEditDateAttribute()
    {

        $dt = Carbon::createFromFormat('Y-m-d', $this->attributes["edit_date"]);
        return $dt->format("d.m.Y");
    }

    public function setDispatchDateAttribute($value)
    {
        $this->attributes['dispatch_date'] = date_convert($value);
    }

    public function getDispatchDateAttribute()
    {

        $dt = Carbon::createFromFormat('Y-m-d', $this->attributes["dispatch_date"]);
        return $dt->format("d.m.Y");
    }

    public function order(){
        return $this->hasOne(SalesOrders::class,"id","order_id");
    }

    public function items(){
        return $this->hasMany(WaybillItems::class,"waybill_id","id");
    }

}
