<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Tag;


class StoreController extends Controller {

    private $modelProduct;
    private $modelCategory;
    private $modelTag;

    public function __construct(Product $product, Category $category, Tag $tag){
        $this->modelProduct  = $product;
        $this->modelCategory = $category;
        $this->modelTag      = $tag;
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

    public function productsTag($id){
        $tag      = $this->modelTag->find($id);
        $products = $tag->products;

        return view('store.products_tag', compact('products','tag'));
    }

   

}
