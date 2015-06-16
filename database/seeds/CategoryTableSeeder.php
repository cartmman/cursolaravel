<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

    public function run(){
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 15)->create();
    }
}