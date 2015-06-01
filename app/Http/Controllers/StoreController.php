<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;


class StoreController extends Controller {

    private $modelProduct;
    private $modelCategory;

    public function __construct(Product $product, Category $category){
        $this->modelProduct  = $product;
        $this->modelCategory = $category;
    }

    public function index(){
        $categories = $this->modelCategory->all();
        $pFeatured  = $this->modelProduct->featured()->get();
        $pRecommend = $this->modelProduct->recommend()->get();

        return view('store.index', compact('categories','pFeatured','pRecommend'));
    }

    public function category($id){
        $categories = $this->modelCategory->all();
        $category = $this->modelCategory->find($id);

        //$products   = $this->modelCategory->find($id)->products()->get();
        $products = $this->modelProduct->OfCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));
    }

    public function product($id){
        $categories = $this->modelCategory->all();
        $product    = $this->modelProduct->find($id);

        return view('store.product', compact('categories', 'product'));
    }

}
