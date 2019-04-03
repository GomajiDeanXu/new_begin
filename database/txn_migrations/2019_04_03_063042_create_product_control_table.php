<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('product_control', function(Blueprint $table)
		{
			$table->integer('cid', true);
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->boolean('type')->default(0)->index('idx_type');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('參考 flag_mapping');
			$table->string('val', 1000)->default('');
			$table->integer('date_create')->default(0);
			$table->integer('extra_ts')->default(0);
			$table->string('nick', 32)->default('');
			$table->dateTime('transfer_time')->comment('預定轉移時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('product_control');
	}

}
