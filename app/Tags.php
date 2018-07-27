<?php

namespace App;

use App\Model\Finance\Expenses;
use App\Model\Sales\SalesOrders;
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

    public function expenses()
    {
        return $this->morphToMany("App\Tags", 'taggable');
    }

    public function sales_orders()
    {
        return $this->morphedByMany(SalesOrders::class, 'taggable');
    }

    public function getSalesOrdersAmountAttribute()
    {
        return get_money($this->sales_orders()->sum("grand_total"));
    }

    public function companies()
    {
        return $this->morphedByMany('App\Companies', 'taggable');
    }

    public function getCompaniesAmountAttribute()
    {

        $total = 0;
        foreach ($this->companies as $company) {
                 $total += $company->sales_orders()->sum("grand_total");
        }

        return get_money($total);

    }

}
