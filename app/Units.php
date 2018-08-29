<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{

    protected $guarded = [];

    public function account()
    {
        return $this->belongsToMany('App\Account',"account_unit","unit_id","account_id","id","id")->withPivot("unit_id");


    }

    public function getAccountUnitAttribute()
    {

        return $this->account->where("id",aid())->count();
    }
}
