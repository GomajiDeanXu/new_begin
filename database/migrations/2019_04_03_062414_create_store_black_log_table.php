<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreBlackLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_black_log', function(Blueprint $table)
		{
			$table->increments('sb_id');
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->string('branch', 500)->default('0');
			$table->string('notice', 100)->default('');
			$table->integer('create_ts');
			$table->boolean('isblack')->default(0)->comment('(0:解黑 1:鎖黑)');
			$table->string('nick', 20)->default('');
			$table->string('product_id', 200)->default('0')->comment('勾不顯示的pid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_black_log');
	}

}
