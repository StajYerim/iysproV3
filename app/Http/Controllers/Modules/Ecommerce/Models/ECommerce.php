<?php

namespace App\Http\Controllers\Modules\Ecommerce\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\Stock\Product\ProductDescriptions;

class ECommerce extends Model
{
  protected $guarded = [];

  protected $table = "ecommerce_products";

  public function name() {
    return $this->hasOne(ProductDescriptions::class, 'product_id', 'iyspro_id');
  }
}
