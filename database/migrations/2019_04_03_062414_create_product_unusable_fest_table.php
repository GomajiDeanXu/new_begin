<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductUnusableFestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_unusable_fest', function(Blueprint $table)
		{
			$table->integer('product_id');
			$table->integer('fest_id');
			$table->boolean('flag')->default(1);
			$table->primary(['product_id','fest_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_unusable_fest');
	}

}
