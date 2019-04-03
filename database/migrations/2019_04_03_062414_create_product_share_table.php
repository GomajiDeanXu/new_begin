<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductShareTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_share', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('product_id')->default(0)->unique('idx_product_id');
			$table->text('share_ids', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_share');
	}

}
