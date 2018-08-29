<?php

namespace App;

use Parasut\Client;

class Parasut {

  private $parasut = null;

  public function __construct($params) {

    $this->parasut = new Client($params);
    $this->parasut->authorize();
  }

  private function add_category($category, $type) {
    $new_category = $this->parasut->make('category')->create([
      'category_type' => $type,
      'name' => $category->name,
      'bg_color' => substr($category->color, 1),
      'text_color' => 'ffffff',
    ]);
    return $new_category['item_category']['id'];
  }

  private function check_category_exist($category, $page = 1) {
    $categories = $this->parasut->make('category')->get($page, 100);
    $found_key = array_search($category->name, array_column($categories['items'], 'name'));
    if (!empty($categories['items']) && $found_key === false && $categories['meta']['page_count'] > $page) {
      return $this->check_category_exist($category, $page + 1);
    }
    return ($found_key !== false) ? $categories['items'][$found_key]['id'] : false;
  }

  private function check_product_in_parasut($product) {
    $parasut_product = \App\Model\Parasut::where('our_id', $product->id)->get()->first();
    return $parasut_product ? true : false;
  }

  private function update_parasut_product($product, $category_exist) {
    $parasut_product = \App\Model\Parasut::where('our_id', $product->id)->get()->first();
    return $this->parasut->make('product')->update($parasut_product->app_record_id, [
      'name' => $product->name,
      'code' => $product->code,
      'barcode' => '123456',
      'buying_price' => money_db_format($product->buying_price),
      'list_price' => money_db_format($product->list_price),
      'vat_rate' => $product->vat_rate,
      'category_id' => $category_exist,
    ]);
  }

  public function sync_stock_product($product) {
    $category_exist = $this->check_category_exist($product->category);
    if ($category_exist === false) {
      $category_exist = $this->add_category($product->category, 'Product');
    }

    $product_already_in_parasut = $this->check_product_in_parasut($product);
    if ($product_already_in_parasut === true) {
      return $this->update_parasut_product($product, $category_exist);
    }

    return $this->parasut->make('product')->create([
      'name' => $product->name,
      'code' => $product->code,
      'barcode' => '123456',
      'buying_price' => money_db_format($product->buying_price),
      'list_price' => money_db_format($product->list_price),
      'vat_rate' => $product->vat_rate,
      'category_id' => $category_exist,
    ]);
  }

}
