<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bankabble extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function setAmountAttribute($value)
    {
            $this->attributes["amount"] = money_db_format($value);
    }

}
