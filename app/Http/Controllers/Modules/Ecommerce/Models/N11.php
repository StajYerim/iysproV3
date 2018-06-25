<?php

namespace App\Http\Controllers\Modules\Ecommerce\Models;

class N11 {
    protected static $_appKey, $_appSecret, $_parameters, $_sclient;
    
    public function __construct(array $attributes = array()) {
        self::$_appKey = $attributes['appKey'];
        self::$_appSecret = $attributes['appSecret'];
        self::$_parameters = ['auth' => ['appKey' => self::$_appKey, 'appSecret' => self::$_appSecret]];
    }
    
    public function setUrl($url) {
        self::$_sclient = new \SoapClient($url);
	}
	
	public function GetTopLevelCategories() {
        $this->setUrl('https://api.n11.com/ws/CategoryService.wsdl');
        return self::$_sclient->GetTopLevelCategories(self::$_parameters);
	}
	
	public function GetSubCategories($categoryId) {
		$this->setUrl('https://api.n11.com/ws/CategoryService.wsdl');
		self::$_parameters['categoryId'] = $categoryId;
		return self::$_sclient->GetSubCategories(self::$_parameters);
	}
 
    public function GetProductList($itemsPerPage, $currentPage) {
        $this->setUrl('https://api.n11.com/ws/ProductService.wsdl');
        self::$_parameters['pagingData'] = ['itemsPerPage' => $itemsPerPage, 'currentPage' => $currentPage];
        return self::$_sclient->GetProductList(self::$_parameters);
    }
 
    public function SaveProduct(array $product = Array()) {
        $this->setUrl('https://api.n11.com/ws/ProductService.wsdl');
        self::$_parameters['product'] = $product;
        return self::$_sclient->SaveProduct(self::$_parameters);
    }
}
