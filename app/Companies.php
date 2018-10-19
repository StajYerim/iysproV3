<?php

namespace App;

use App\Model\Companies\Address;
use App\Model\Finance\BankItems;
use App\Model\Finance\Cheques;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
  protected $guarded = [];

  protected $table = "company_list";
  protected $appends = ["balance"];

    public $rules = [
        'company_name' => 'required|max:150',
        'company_short_name' => 'max:50',
        'char_code' => 'max:50',
        'tax_id' => 'max:50',
        'tax_office' => 'max:50',
        'iban' => 'max:50',
        'address' => 'max:200',
        'town' => 'max:50',
        'city' => 'max:50',
        'email' => 'max:50',

    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where("account_id", '=', aid());
    }

    public function scopeList($query, $type, $aid)
    {
        if ($type == 'customer') {
            return $query->where('account_id', $aid)->where("customer", 1)->get();
        } else {
            return $query->where('account_id', $aid)->where("supply", 1)->get();
        }

    }

  public function address(){
      return $this->hasOne(Address::class,"company_id","id");
  }

    public function getEmailAttribute()
    {
        return $this->address["email"];
    }

    public function getAddresssAttribute()
    {
        return $this->address["address"];
    }

    public function getCityAttribute()
    {
        return $this->address["city"];
    }
    public function getTownAttribute()
    {
        return $this->address["town"];
    }
    public function getPhoneAttribute()
    {
        return $this->address["phone_number"];
    }
    public function getFaxAttribute()
    {
        return $this->address["fax_number"];
    }

    public function sales_orders()
    {
        return $this->hasMany(SalesOrders::class, "company_id", "id");
    }

    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrders::class, "company_id", "id");
    }

    public function getOpenOrdersAttribute()
    {
        $list = $this->sales_orders;

        $open = [];
        foreach ($list as $order) {

            if (money_db_format($order->remaining) > 0)

                $open[] = $order;
        }


        return $open;
    }

    public function getPopenOrdersAttribute()
    {
        $list = $this->purchase_orders;

        $open = [];
        foreach ($list as $order) {

            if (money_db_format($order->remaining) > 0)

                $open[] = $order;
        }


        return $open;
    }

    public function collects()
    {
        return $this->hasMany(BankItems::class, "company_id", "id");
    }

    public function buy_cheques()
    {
        return $this->hasMany(Cheques::class, "company_id", "id");
    }

    public function sell_cheques()
    {
        return $this->hasMany(Cheques::class, "transfer_company_id", "id");
    }

    public function getBalanceAttribute()
    {
        //Satış Siparişlerinin Toplam Tutarı;
        $sales_orders = $this->sales_orders()->sum("exchange_total");

        //Alış Siparişlerinin Toplam Tutarı;
        $purchase_orders = $this->purchase_orders()->sum("grand_total");

        //Yapılan Tahsilat
        $collects = $this->collects()->where("action_type", 1)->sum("amount");

        //Yapılan Ödeme
        $payments = $this->collects()->where("action_type", 0)->sum("amount");

        //Alınan Çek
        $buy_cheques = $this->buy_cheques()->sum("amount");

        //Verilen Çek
        $sell_cheques = $this->sell_cheques()->sum("amount");


        $sales_net_total =  $sales_orders-($collects + $buy_cheques);
        $purchase_net_total = $purchase_orders-($payments+ $sell_cheques);

        return get_money($sales_net_total-$purchase_net_total);
    }

    public function getMoneyStatusAttribute()
    {
            $money = money_db_format($this->balance);
            if($money > 0){
                return "TAHSİL EDİLECEK";
            }elseif($money<0){
                return "ALACAKLI";
            }
    }

    //Satış Siparişlerine İşlenmemiş Tahsilatlar
    public function getOpenReceiptsAttribute()
    {
        $list = $this->collects;

        $open = [];
        foreach ($list as $collect) {
        if($collect->action_type == 1){

            if ($collect->remaining > 0) {

                $open[] = $collect;
            }

        }

        }
        return $open;
    }

    //Alış siparişne işlenmemiş ödemeler
    public function getPopenReceiptsAttribute()
    {
        $list = $this->collects;

        $open = [];
        foreach ($list as $collect) {
            if($collect->action_type == 0) {
                if ($collect->remaining > 0) {

                    $open[] = $collect;
                }
            }
        }
        return $open;
    }

    public function getOpenChequesAttribute()
    {
        $list = $this->buy_cheques;

        $open = [];
        foreach ($list as $cheque) {

            if ($cheque->remaining > 0) {

                $open[] = $cheque;
            }
        }
        return $open;
    }

    public function getPopenChequesAttribute()
    {
        $list = $this->sell_cheques;

        $open = [];
        foreach ($list as $cheque) {

            if ($cheque->remaining > 0) {

                $open[] = $cheque;
            }
        }
        return $open;
    }

    //Satış Siparişi oluşturulduğunda Müşterinin daha önceden tahsilatı var ise alış faturasına aktarılır
    public function open_receipts_set($open_receipts, $open_cheques, $order)
    {

        //Açık Banka Fişleri
        foreach ($open_receipts as $receipts) {
            $ordersd = SalesOrders::find($order->id);
            $siparis_total = money_db_format($ordersd->remaining);
            $receipt_remaining = money_db_format($receipts->remaining);

            //Banka fişi tutarı sipariş toplamından büyük veya eşit ise sipariş toplamını öde
            if ($siparis_total < $receipt_remaining) {

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => get_money($siparis_total),
                ]);


            } elseif($siparis_total > $receipt_remaining) {

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => get_money($receipt_remaining)
                ]);
            }else{

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" =>  get_money($siparis_total)
                ]);
            }
        }

        //Açık Çekler
        foreach ($open_cheques as $cheque) {
            $orders = SalesOrders::find($order->id);
            $siparis_toplam = money_db_format($orders->remaining);
            $remaining = money_db_format($cheque->remaining);

            //Banka fişi tutarı sipariş toplamından büyük veya eşit ise sipariş toplamını öde
            if ($siparis_toplam < $remaining) {

                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => get_money($siparis_toplam),
                ]);


            } else if($siparis_toplam > $remaining) {

                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => get_money($remaining)
                ]);


            }else{
                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => get_money($siparis_toplam),
                ]);
            }
        }


        Bankabble::where("amount",0)->delete();

    }

    //Alış Siparişi oluşturulduğunda Tedarikçinin daha önceden avansı var ise alış faturasına aktarılır
    public function open_receipts_payment_set($open_receipts,$open_cheques, $order)
    {

        //Açık Banka Fişleri
        foreach ($open_receipts as $receipts) {

            $ordersd = PurchaseOrders::find($order->id);

            $siparis_total = money_db_format($ordersd->remaining);

            $receipt_remaining = money_db_format($receipts->remaining);

            //Banka fişi tutarı sipariş toplamından büyük veya eşit ise sipariş toplamını öde
            if ($siparis_total < $receipt_remaining) {

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => get_money($siparis_total),
                ]);


            } else if($siparis_total > $receipt_remaining){

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => get_money($receipt_remaining)
                ]);


            }else{
                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => get_money($siparis_total),
                ]);
            }
        }

        //Verilen Çekler
        foreach ($open_cheques as $cheque) {
            $orders = PurchaseOrders::find($order->id);
            $siparis_toplam = money_db_format($orders->remaining);
            $remaining = money_db_format($cheque->remaining);
            //Banka fişi tutarı sipariş toplamından büyük veya eşit ise sipariş toplamını öde
            if ($siparis_toplam < $remaining) {

                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => get_money($siparis_toplam),
                ]);


            } elseif($siparis_toplam > $remaining){

                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => get_money($remaining)
                ]);


            }else{
                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => get_money($siparis_toplam),
                ]);
            }
        }


        Bankabble::where("amount",0)->delete();


    }

    public function getStatementAttribute()
    {
       //SalesOrders

        $statements = [];

        foreach($this->sales_orders as $order){
            $order["pro_type"] = "sales_order";
            $order["type_text"] = "Satış Siparişi";
            $order["amount_type"] = "-";
            $statements[] = $order;

        }

        foreach ($this->purchase_orders as $order) {
            $order["pro_type"] = "purchase_order";
            $order["type_text"] = "Alış Siparişi";
            $order["amount_type"] = "+";
            $statements[] = $order;

        }

        foreach($this->collects as $collect){
            if ($collect->action_type == 1) {
                $collect["pro_type"] = "collect";
                $collect["type_text"] = "Tahsilat";
                $order["amount_type"] = "+";
            } else {
                $collect["pro_type"] = "payment";
                $collect["type_text"] = "Ödeme";
                $order["amount_type"] = "-";
            }
            $statements[] = $collect;

        }


        foreach ($this->buy_cheques as $buy_cheque) {
            $buy_cheque["pro_type"] = "buy_cheque";
            $buy_cheque["type_text"] = "Alınan Çek";
            $order["amount_type"] = "+";
            $statements[] = $buy_cheque;

        }

        foreach ($this->sell_cheques as $sell_cheque) {
            $sell_cheque["pro_type"] = "sell_cheque";
            $sell_cheque["type_text"] = "Verilen Çek";
            $order["amount_type"] = "-";
            $statements[] = $sell_cheque;
        }

        return $statements;

    }

    public function getStatementListAttribute()
    {
        $data = $this->statement;

        usort($data, "sortFunction");
        return $data;
    }

    public function tags()
    {
        return $this->morphToMany(Tags::class, 'taggable');
    }


}
