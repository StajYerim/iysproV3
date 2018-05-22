<?php

namespace App;

use App\Model\Companies\Address;
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
}
