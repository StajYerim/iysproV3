<?php

namespace App;

use App\Model\Finance\Expenses;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
  protected $guarded = [];
  public $timestamps = false;

    public function save(array $options = array())
    {
        if (!$this->account_id) {
            $this->account_id = aid();
        }

        parent::save($options);
    }

    public function expenses(){
        return $this->morphToMany("App\Tags", 'taggable');
    }
}
