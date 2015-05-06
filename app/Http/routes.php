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
*/

Route::group(['prefix'=>'admin'], function(){
    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('products', 'AdminProductsController@index');
});



Route::get('category/{category}', function(\CodeCommerce\Category $category){
    return $category->name;
});

Route::pattern('id','[0-9]+');

Route::get('user/{id?}', function($id = 123){

    if($id)
        return "Olá $id";

    return "não possui id";
});

Route::get('/', 'WelcomeController@index');

Route::put('exemplo', 'WelcomeController@exemplo');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
