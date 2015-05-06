<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Product;

class AdminProductsController extends Controller {

    private $products;

    public function __construct(Product $product){
        $this->products = $product;
    }

    public function index(){
        $p = $this->products->all();
        return view('products',compact('p'));
    }

}