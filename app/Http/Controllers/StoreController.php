<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

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
        $products   = $this->modelCategory->find($id)->products()->get();

        return view('store.categories', compact('categories','products'));
    }

}
