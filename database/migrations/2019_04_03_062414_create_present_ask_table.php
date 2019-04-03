<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentAskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_ask', function(Blueprint $table)
		{
			$table->increments('present_ask_id');
			$table->integer('ask_type')->unsigned()->default(0)->comment('1 GOMAJI提問，2 店家回覆');
			$table->integer('id')->unsigned()->default(0)->index('idx_id')->comment('ask_type 1 = 後台USERID，2 = store_id');
			$table->integer('present_id')->unsigned()->default(0)->index('idx_present_id')->comment('提品ID');
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id')->comment('product.product_id');
			$table->string('content')->comment('問題來往內容');
			$table->integer('create_ts')->unsigned()->default(0)->comment('建立時間');
			$table->boolean('flag')->default(0)->comment('1.有效:0.無效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_ask');
	}

}
