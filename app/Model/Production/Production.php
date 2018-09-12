<?php

namespace App\Model\Production;

use App\Model\Sales\SalesOrders;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $guarded = [];
    protected $appends = ["finish_date","starting_date","status_label"];
    protected $dates = ["start_date"];

//    /*Default where account_id*/
//    public function newQuery($excludeDeleted = true)
//    {
//        return parent::newQuery($excludeDeleted)
//            ->where("account_id", '=', aid());
//    }

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

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="label label-danger">BEKLEMEDE</span>';
        } else if ($this->status == 1) {
            return '<span class="label label-warning">ÜRETİMDE</span>';
        } else if ($this->status == 2) {
            return '<span class="label label-success">TAMAMLANDI</span>';
        }

        if ($this->invoice) {
            return '<span class="label label-success">FATURA EDİLDİ</span>';
        } else {
            return '<span class="label label-warning">AÇIK</span>';
        }
    }

    /*Sales order*/

    public function order(){
        return $this->hasone(SalesOrders::class,"id","sales_order_id");
    }

    public function getFinishDateAttribute(){
        $dt = Carbon::createFromFormat('Y-m-d', $this->attributes["start_date"]);
        return $dt->addDays($this->attributes["day"])->format("Y-m-d");
    }

    public function getStartingDateAttribute(){
        $dt = Carbon::createFromFormat('Y-m-d', $this->attributes["start_date"]);
       return $dt->format("Y-m-d");
    }
}
