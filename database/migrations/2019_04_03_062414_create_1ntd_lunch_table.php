<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create1ntdLunchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('1ntd_lunch', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('org_product_id')->default(0);
			$table->integer('new_product_id')->default(0)->index('idx_new_product_id');
			$table->integer('org_price')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('1ntd_lunch');
	}

}
