<?php

namespace App\Model\Finance;

use App\Bankabble;
use App\Companies;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BankItems extends Model
{
    protected $guarded = [];
    protected $dates = ["date"];
    protected $appends = ["bank_name"];

    public function setAmountAttribute($amount)
    {
        $this->attributes['amount'] = money_db_format($amount);
    }

    public function getAmountAttribute()
    {
        return get_money($this->attributes["amount"]);
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date_convert($value);
    }

    public function getDateAttribute()
    {
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["date"]);
        return $dt->format("d.m.Y");
    }

    public function getDatemAttribute()
    {
     return $this->attributes["date"];
    }

    public function getContactAttribute()
    {
        switch ($this->type) {
            case "account_transfer";
                $bank = BankAccounts::find($this->doc_id);
                return $bank->name;
        }
    }

    public function bank_account()
    {
        return $this->hasOne(BankAccounts::class, "id", "bank_account_id");
    }

    public function company()
    {
        return $this->hasOne(Companies::class, "id", "company_id");
    }

    public function orders()
    {
        return $this->morphedByMany(SalesOrders::class, 'bankabble')->withPivot("amount");
    }

    public function porders()
    {
        return $this->morphedByMany(PurchaseOrders::class, 'bankabble')->withPivot("amount");
    }

    public function bankabble()
    {
        return $this->hasOne(Bankabble::class, "bank_items_id", "id");
    }

    public function getRemainingAttribute()
    {
        $used = $this->orders->sum("pivot.amount");
        $pused = $this->porders->sum("pivot.amount");
        $total = money_db_format($this->amount);
        $general_total = get_money($total - $used-$pused);

        return $general_total;

    }

    public function getStatusTextAttribute()
    {
        if($this->type=="start_balance"){
            return  "AÇILIŞ BAKİYESİ";
        }else if($this->type =="money_in"){
            return "PARA GİRİŞİ";
        }else if($this->type == "money_out"){
            return "PARA ÇIKIŞI";
        }else if($this->type == "collect") {
            return "TAHSİLAT";
        }else if($this->type=="payment"){
            return "ÖDEME";
        }else if($this->type=="cheque_payment"){
            return "ÇEK ÖDEMESİ";
        }else if($this->type == "cheque_collect"){
            return "ÇEK TAHSİLATI";
        }else if($this->type == "account_transfer"){
            return "PARA TRANSFERİ";
        }else if($this->type =="expenses"){
            return "GİDER FİŞİ";
        }
    }

    public function getBankNameAttribute(){
        return $this->bank_account["name"];
    }


}