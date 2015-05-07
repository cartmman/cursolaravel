<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;

class ProductsController extends Controller {

    private $productModel;

    public function __construct(Product $product){
        $this->productModel = $product;
    }

    public function index(){
        $products = $this->productModel->paginate(10);
        return view('products.index',compact('products'));
    }

    public function create(Category $category){
        $categories = $category->lists('name','id');
        return view('products.create',compact('categories'));
    }

    public function store(ProductRequest $request){
        $this->productModel->create($request->all());
        return redirect()->route('products');
    }

    public function edit($id, Category $category){
        $categories = $category->lists('name','id');
        $product = $this->productModel->find($id);
        return view('products.edit',compact('product','categories'));
    }

    public function update(ProductRequest $request,$id){
        $request->get('featured')  ? null : $request['featured'] = 0;
        $request->get('recommend') ? null : $request['recommend'] = 0;

        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products');
    }

    public function destroy($id){
        $this->productModel->find($id)->delete();
        return redirect()->route('products');
    }

}