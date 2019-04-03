<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreDeceiveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_deceive', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->boolean('ch')->nullable()->default(8)->index('idx_ch')->comment('頻道');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店ID');
			$table->string('full_name', 45)->default('')->comment('通報人姓名');
			$table->string('email', 45)->default('')->comment('通報人email');
			$table->string('phone', 15)->default('')->comment('通報人電話');
			$table->string('content')->default('')->comment('洗單描述');
			$table->integer('create_ts')->index('idx_create_ts')->comment('通報建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_deceive');
	}

}
