<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {

    public function run(){
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 40)->create();
    }
}