<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_control', function(Blueprint $table)
		{
			$table->integer('scid', true);
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家編號');
			$table->boolean('type')->default(0)->index('idx_type')->comment('事件類別');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態');
			$table->string('val', 20)->default('')->comment('事件控制值');
			$table->integer('date_create')->default(0)->comment('建立時間');
			$table->integer('extra_ts')->default(0)->comment('時間記錄');
			$table->string('nick', 32)->default('')->comment('申請人');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_control');
	}

}
