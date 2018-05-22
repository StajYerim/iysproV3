<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountUnits extends Model
{

   protected $table = "account_unit";
    protected $fillable = ['account_id', 'unit_id'];
    public $timestamps = false;
}
