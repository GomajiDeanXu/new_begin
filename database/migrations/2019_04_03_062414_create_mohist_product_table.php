<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMohistProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mohist_product', function(Blueprint $table)
		{
			$table->increments('id')->comment('系統流水號');
			$table->string('product_sernum', 50)->default('')->unique('idx_product_sernum')->comment('產品ID');
			$table->string('product_name', 50)->default('0')->comment('商品名稱');
			$table->text('description', 65535)->nullable()->comment('商品描述');
			$table->boolean('is_valid')->default(1)->comment('1:有效 0:無效');
			$table->integer('redeem_start_ts')->default(0)->comment('產品兌換開始時間');
			$table->integer('redeem_end_ts')->default(0)->comment('產品兌換結束時間');
			$table->integer('buy_number')->default(0)->comment('商品採購數');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->string('create_user', 30)->default('')->comment('建立人員');
			$table->integer('modify_ts')->default(0)->comment('異動時間');
			$table->string('modify_user', 30)->default('')->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mohist_product');
	}

}
