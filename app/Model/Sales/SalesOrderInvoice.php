<?php

namespace App\Model\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SalesOrderInvoice extends Model
{
    protected $guarded = [];

    protected $dates = ["date", "due_date"];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date_convert($value);
    }

    public function getDateAttribute()
    {

        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["date"]);
        return $dt->format("d.m.Y");
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

    public function order()
    {
        return $this->hasOne(SalesOrders::class,"id","sales_order_id");
    }

}
