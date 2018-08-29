<?php

namespace App\Model\Companies;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "company_addresses";
    protected $guarded = [];
    public $timestamps = false;
}
