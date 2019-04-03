<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMypadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mypad', function(Blueprint $table)
		{
			$table->integer('mid', true);
			$table->boolean('model')->default(0)->index('idx_model')->comment('機型：1:viewpad / 2:mypad');
			$table->char('phone', 10)->default('')->index('idx_phone');
			$table->string('sn', 16)->default('')->index('idx_sn')->comment('資產編號');
			$table->boolean('version')->default(0)->index('idx_version')->comment('軟體版本');
			$table->boolean('rent_type')->default(0)->index('idx_rent_type')->comment('1:員工 / 2:店家');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店 group_id');
			$table->string('rent_name', 45)->default('')->index('idx_rent_name')->comment('保管人：員工姓名 / 分店名稱');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('建立(進貨)時間');
			$table->integer('delivery_ts')->default(0)->comment('到貨日期');
			$table->integer('rent_ts')->default(0)->index('idx_rent_ts')->comment('出借時間');
			$table->string('memo')->nullable()->comment('備註');
			$table->integer('store_id')->default(0)->index('store_id');
			$table->integer('status')->default(0)->index('status');
			$table->integer('flag')->default(0)->index('flag');
			$table->boolean('pad_status')->default(1)->comment('機器狀態');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mypad');
	}

}
