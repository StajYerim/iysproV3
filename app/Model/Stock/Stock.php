<?php

namespace App\Model\Stock;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock_receipts";
    protected $guarded = [];
    protected $dates = ["date"];

    public function items(){
        return $this->hasMany("App\Model\Stock\StockItems");
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date_convert($value);
    }

    public function getDateAttribute()
    {
     $explode = explode("-",$this->attributes["date"]);
     $dt = Carbon::create($explode[0],$explode[1],$explode[2]);
     return $dt->format("d.m.Y H:i:s");
    }

    public function company(){
        return $this->hasOne("App\Companies","id","company_id");
    }

    public function getTypeNameAttribute(){

      foreach(movements_type() as $mov){
          if($mov["id"] == $this->receipt_id){
              return $mov["name"];
          }
      }

    }
}
