<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

    public function run(){
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(
            [
                'name'     => 'Wesley',
                'email'    => 'wesleyjipa@hotmail.com',
                'password' => Hash::make(123456),
            ]
        );

        factory('CodeCommerce\User')->create(
            [
                'name'     => 'admin',
                'email'    => 'admin@hotmail.com',
                'password' => Hash::make(123456),
                'is_admin' => true
            ]
        );

        factory('CodeCommerce\User', 10)->create();
    }
}