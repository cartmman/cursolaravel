<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('products', function(Blueprint $table)
        {
            $table->boolean('featured')->default(0);
            $table->boolean('recommend')->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('products', function(Blueprint $table)
        {
            $table->removeColumn('featured');
            $table->removeColumn('recommend');
        });
	}

}
