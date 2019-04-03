<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTemp2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp2', function(Blueprint $table)
		{
			$table->integer('product_id')->nullable();
			$table->integer('price')->nullable();
			$table->integer('org_price')->nullable();
			$table->string('product_name')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('temp2');
	}

}
