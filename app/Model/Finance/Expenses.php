<?php

namespace App\Model\Finance;


use App\Tags;
use App\Model\Finance\BankAccounts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Carbon;


class Expenses extends Model
{
    protected $guarded = [];
    protected $appends = ["bank_item","payment_status","pay_status","bank_name","tags_label"];

    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }

    public $rules = [
        'name' => 'required|max:150',
        'amount' => 'required|max:12'

    ];

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

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = date_convert($value);
    }

    public function getPaymentDateAttribute()
    {
        $dt = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes["payment_date"]);
        return $dt->format("d.m.Y");
    }


    public function tags()
    {
        return $this->morphToMany(Tags::class, 'taggable');
    }

    public function getTagsLabelAttribute(){
        $tags = "";

        foreach($this->tags as $tag){
            $tags .= "<span class='badge' style='background-color:".$tag["bg_color"]."' > ".$tag["title"]."</span >";

        }

        return  $tags;
    }

    public function getBankItemAttribute()
    {
        return BankItems::with("bank_account")->where(["type" => "expenses", "doc_id" => $this->id])->first();
    }

    public function bank()
    {
        return $this->hasone(BankAccounts::class,"id","bank_account_id");
    }

    public function getBankNameAttribute(){
        return $this->bank["name"];
    }

    public function getPaymentStatusAttribute()
    {
        if($this->bank_item){
            return 1;
        }else{
            return 0;
        }
    }

    public function getPayStatusAttribute()
    {
        if($this->bank_item){
            return 1;
        }else{
            return 0;
        }
    }
}
