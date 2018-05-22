<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function city(){
        return $this->hasOne("App\City","id","province_id");
    }
}
