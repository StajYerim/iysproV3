<?php

namespace App;

use App\Model\Finance\Expenses;
use App\Model\Purchases\PurchaseOrders;
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

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where("account_id", '=', aid());
    }

    public function expenses()
    {
        return $this->morphToMany("App\Tags", 'taggable');
    }

    public function expenses_tags()
    {
        return $this->morphedByMany(Expenses::class, 'taggable');
    }

    public function sales_orders()
    {
        return $this->morphedByMany(SalesOrders::class, 'taggable');
    }

    public function purchase_orders()
    {
        return $this->morphedByMany(PurchaseOrders::class, 'taggable');
    }

    public function getSalesOrdersAmountAttribute()
    {
        return get_money($this->sales_orders()->sum("exchange_total"));
    }

    public function getPurchaseOrdersAmountAttribute()
    {
        return get_money($this->purchase_orders()->sum("exchange_total"));
    }

    public function getPurchaseOrdersAmountSafeAttribute()
    {
        return get_money($this->purchase_orders()->sum("sub_total"));
    }

    public function getSalesOrdersAmountSafeAttribute()
    {
        return get_money($this->sales_orders()->sum("sub_total"));
    }

    public function companies()
    {
        return $this->morphedByMany('App\Companies', 'taggable');
    }

    public function getCompaniesAmountAttribute()
    {

        $total = 0;
        foreach ($this->companies as $company) {
                 $total += $company->sales_orders()->sum("exchange_total");
        }

        return ($total);

    }

    public function getCompaniesAmountSafeAttribute()
    {

        $total = 0;
        foreach ($this->companies as $company) {
            $total += $company->sales_orders()->sum("sub_total");
        }

        return ($total);

    }


    public function getCompaniesPurchaseAmountAttribute()
    {

        $total = 0;
        foreach ($this->companies as $company) {
            $total += $company->purchase_orders()->sum("exchange_total");
        }

        return ($total);

    }

    public function getCompaniesPurchaseAmountSafeAttribute()
    {

        $total = 0;
        foreach ($this->companies as $company) {
            $total += $company->purchase_orders()->sum("sub_total");
        }

        return ($total);

    }

}
