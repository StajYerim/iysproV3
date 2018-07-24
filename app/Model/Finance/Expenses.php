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

    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }

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


    public function tags()
    {
        return $this->morphToMany(Tags::class, 'taggable');
    }

    public function bank_item()
    {
        return $this->hasone(BankItems::class,"doc_id","id");
    }

    public function bank()
    {
        return $this->hasone(BankAccounts::class,"id","bank_account_id");
    }
}
