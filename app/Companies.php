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

    public function getBalanceAttribute()
    {
        //Satış Siparişlerinin Toplam Tutarı;
        $sales_orders = $this->sales_orders()->sum("grand_total");

        //Alış Siparişlerinin Toplam Tutarı;
        $purchase_orders = $this->purchase_orders()->sum("grand_total");

        //Yapılan Tahsilat
        $collects = $this->collects()->where("action_type", 1)->sum("amount");

        //Yapılan Ödeme
        $payments = $this->collects()->where("action_type", 0)->sum("amount");

        //Alınan Çek
        $buy_cheques = $this->buy_cheques()->sum("amount");

        $sales_net_total =  $sales_orders-($collects + $buy_cheques);
        $purchase_net_total = $purchase_orders-$payments;

        return get_money($sales_net_total-$purchase_net_total);
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

    //Satış Siparişi oluşturulduğunda Müşterinin daha önceden tahsilatı var ise alış faturasına aktarılır
    public function open_receipts_set($open_receipts, $open_cheques, $order)
    {


        Bankabble::where("bankabble_id", $order->id)->where("bankabble_type", "App\Model\Sales\SalesOrders")->delete();



        //Açık Banka Fişleri
        foreach ($open_receipts as $receipts) {
            $ordersd = SalesOrders::find($order->id);
            $siparis_total = money_db_format($ordersd->remaining);
            $receipt_remaining = $receipts->remaining;
            //Banka fişi tutarı sipariş toplamından büyük veya eşit ise sipariş toplamını öde
            if ($siparis_total <= $receipt_remaining) {

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => get_money($siparis_total),
                ]);


            } else {

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => $receipt_remaining
                ]);


            }
        }

        sleep(1);
        //Açık Çekler
        foreach ($open_cheques as $cheque) {
            $orders = SalesOrders::find($order->id);
            $siparis_toplam = money_db_format($orders->remaining);
            $remaining = $cheque->remaining;
            //Banka fişi tutarı sipariş toplamından büyük veya eşit ise sipariş toplamını öde
            if ($siparis_toplam <= $remaining) {

                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => get_money($siparis_toplam),
                ]);


            } else {

                Bankabble::create([
                    "cheques_id" => $cheque->id,
                    "bankabble_type" => "App\Model\Sales\SalesOrders",
                    "bankabble_id" => $orders->id,
                    "amount" => $remaining
                ]);


            }
        }


        Bankabble::where("amount",0)->delete();

    }

    //Alış Siparişi oluşturulduğunda Tedarikçinin daha önceden avansı var ise alış faturasına aktarılır
    public function open_receipts_payment_set($open_receipts, $order)
    {

        Bankabble::where("bankabble_id", $order->id)->where("bankabble_type", "App\Model\Purchases\PurchaseOrders")->delete();



        //Açık Banka Fişleri
        foreach ($open_receipts as $receipts) {

            $ordersd = PurchaseOrders::find($order->id);

            $siparis_total = money_db_format($ordersd->remaining);

            $receipt_remaining = $receipts->remaining;

            //Banka fişi tutarı sipariş toplamından büyük veya eşit ise sipariş toplamını öde
            if ($siparis_total <= $receipt_remaining) {

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => get_money($siparis_total),
                ]);


            } else {

                Bankabble::create([
                    "bank_items_id" => $receipts->id,
                    "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                    "bankabble_id" => $ordersd->id,
                    "amount" => $receipt_remaining
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
            $statements[] = $order;
        }

        foreach($this->collects as $collect){
            $statements[] = $collect;
        }

        foreach($this->buy_cheques as $cheque){
            $statements[] = $cheque;
        }

        return $statements;

    }

}
