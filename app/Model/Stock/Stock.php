<?php

namespace App\Model\Stock;
use App\Model\Purchases\PurchaseOrderItems;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock_receipts";
    protected $guarded = [];
    protected $dates = ["date"];
    protected $appends = ['type_name'];

    public function items(){
        return $this->hasMany("App\Model\Stock\StockItems");
    }

    public function order_items(){
            return  $this->hasMany(PurchaseOrderItems::class,"id","doc_id");
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date_convert($value);
    }

    public function getDateAttribute()
    {

     $dt = Carbon::createFromFormat("Y-m-d H:i:s",$this->attributes["date"]);
     return $dt->format("d.m.Y");
    }

    public function setDispatchDateAttribute($value)
    {
        $this->attributes['dispatch_date'] = date_convert($value);
    }

    public function getDispatchDateAttribute()
    {

        $dt = Carbon::createFromFormat("Y-m-d H:i:s",$this->attributes["dispatch_date"]);
        return $dt->format("d.m.Y");
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
