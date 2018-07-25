<?php

namespace App\Model\Stock\Product;


use App\Model\Purchases\PurchaseOrderItems;
use App\Model\Sales\SalesOrders;
use App\Model\Sales\SalesOrderItems;
use App\Model\Stock\Stock;
use App\Model\Stock\StockItems;
use App\Units;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $guarded = [];

    public $rules = [
        'name' => 'required|max:200',
        'barcode' => 'max:100',
        'code' => 'max:100',
        'buying_currency' => 'max:15',
        'buying_price' => 'max:15',

    ];

    //Category info
    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

    //All barcodes
    public function barcodes()
    {
        return $this->hasMany(Barcode::class, "product_id", "id");
    }

    //First reg barcode
    public function getBarcodeAttribute()
    {
        return $this->barcodes()->first()["barcode"];
    }

    //Ürünün Alış fiyatı -> veritabanına uygun şekilde kayıt edilir decimal
    public function setBuyingPriceAttribute($value)
    {
        $this->attributes['buying_price'] = money_db_format($value);
    }

    //Ürünün Satış fiyatı -> veritabanına uygun şekilde kayıt edilir decimal
    public function setListPriceAttribute($value)
    {
        $this->attributes['list_price'] = money_db_format($value);
    }

    public function getBuyingPriceAttribute()
    {
        return get_money($this->attributes["buying_price"]);
    }

    public function getListPriceAttribute()
    {
        return get_money($this->attributes["list_price"]);
    }

    public function images()
    {
        return $this->belongsToMany('App\Images', "product_images", "product_id", "image_id", "id", "id");
    }

    public function named()
    {
        return $this->hasOne(ProductDescriptions::class)->where("lang_code","tr");
    }

    public function names()
    {
        return $this->hasMany(ProductDescriptions::class);
    }

    public function getTypeNameAttribute()
    {
        foreach (product_type_list() as $data) {
            if ($data["id"] == $this->type_id) {
                return $data["name"];
            }
        }
    }

    public function getNameAttribute()
    {
        return $this->names()->where("lang_code","tr")->first()["name"];
    }


    public function lang($id, $lang)
    {
       if($lang == "en")
       {
           $lang = "us";
       }
        $data = ProductDescriptions::where("product_id", $id)->where("lang_code", $lang)->first();

        if ($data == "[]") {
            $data = ProductDescriptions::where("product_id", $id)->where("lang_code", "tr")->first();
            return $data["name"];
        } else {
            return $data["name"];
        }
    }

    public function stock_receipts(){
        return $this->belongsToMany(Stock::class,"stock_items");
    }

    public function porder(){
        return $this->hasMany(PurchaseOrderItems::class,"product_id","id");
    }

    public function getStockCountAttribute(){

        //Porder
            $porder_in = $this->porder()->sum("quantity");
        //Stock Hareketleri
         $in = $this->stock_receipts()->where("status", "=",0)->sum("quantity");
         $out = $this->stock_receipts()->where("status", "=",1)->sum("quantity");

      return  ($in-$out)+$porder_in;
    }

    public function order_items()
    {
        return $this->hasMany(SalesOrderItems::class, "product_id",  "id");
    }

    public function waybills()
    {
        $this->hasMany(StockItems::class, "product_id", "id");
    }

    public function getOrderCountAttribute(){
        $toplam_sipariler = $items = $this->order_items;
        $order = $items = $this->order_items()->sum("quantity");
        $waybill = 0;
        foreach ($toplam_sipariler as $sip) {

          return intval($sip->waybill_item["quantity"]);
        }

        return $order-$waybill;

    }

    public function unit(){
        return $this->hasOne(Units::class,"id","unit_id");
    }

    public function movements()
    {
        return $this->hasMany(StockItems::class, "product_id", "id");
    }

}
