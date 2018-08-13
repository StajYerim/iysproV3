<?php

namespace App\Model\Production;

use App\Model\Sales\SalesOrders;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $guarded = [];

    /*Default where account_id*/
    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where("account_id", '=', aid());
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = date_convert($value);
    }

    public function getStartDateAttribute()
    {

        $dt = Carbon::createFromFormat('Y-m-d', $this->attributes["start_date"]);
        return $dt->format("d.m.Y");
    }

    /*Status Text*/
    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return "BEKLEMEDE";
        } else if ($this->status == 1) {
            return "ÜRETİMDE";
        } else if ($this->status == 2) {
            return "TAMAMLANDI";
        }
    }

    /*Sales order*/

    public function order(){
        return $this->hasone(SalesOrders::class,"id","sales_order_id");
    }
}
