<?php
/*
Route::match(['get','post'],'exemplo2', function(){
    return "oi";
});

Route::any('exemplo2', function(){

});

Route::get('produtos-legais',['as'=>'produtos', function(){
    echo Route::currentRouteName();
    //return "Produtos";
}]);

Route::pattern('id','[0-9]+');

Route::get('user/{id?}', function($id = 123){

    if($id)
        return "Olá $id";

    return "não possui id";
});
*/

Route::group(['prefix'=>'admin'], function(){
    Route::get('categories',['as'=>'categories','uses'=>'AdminCategoriesController@index']);
    Route::post('categories',['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
    Route::get('categories/create',['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
    Route::get('categories/{id}/destroy',['as'=>'categories.destroy','uses'=>'AdminCategoriesController@destroy']);
    Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
    Route::put('categories/{id}/update',['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);

    Route::get('products',['as'=>'products','uses'=>'AdminProductsController@index']);
    Route::post('products',['as'=>'products.store','uses'=>'AdminProductsController@store']);
    Route::get('products/create',['as'=>'products.create','uses'=>'AdminProductsController@create']);
    Route::get('products/{id}/destroy',['as'=>'products.destroy','uses'=>'AdminProductsController@destroy']);
    Route::get('products/{id}/edit',['as'=>'products.edit','uses'=>'AdminProductsController@edit']);
    Route::put('products/{id}/update',['as'=>'products.update','uses'=>'AdminProductsController@update']);
});

/*
Route::get('categories',['as'=>'categories','uses'=>'CategoriesController@index']);
Route::post('categories',['as'=>'categories.store','uses'=>'CategoriesController@store']);
Route::get('categories/create',['as'=>'categories.create','uses'=>'CategoriesController@create']);
Route::get('categories/{id}/destroy',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy']);
Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
Route::put('categories/{id}/update',['as'=>'categories.update','uses'=>'CategoriesController@update']);
*/

Route::get('/', 'WelcomeController@index');

Route::put('exemplo', 'WelcomeController@exemplo');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
