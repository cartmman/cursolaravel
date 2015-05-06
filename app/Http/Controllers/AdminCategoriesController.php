<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Category;

class AdminCategoriesController extends Controller {

    protected $categories;

    public function __construct(Category $category){
        $this->categories = $category;
    }

    public function index(){
        $c = $this->categories->all();
        return view('categories',compact('c'));
    }
}