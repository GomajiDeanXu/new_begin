<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMypadLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mypad_log', function(Blueprint $table)
		{
			$table->integer('log_id', true);
			$table->integer('mid')->default(0);
			$table->boolean('model')->default(0)->index('idx_model')->comment('機型：1:viewpad / 2:mypad');
			$table->char('phone', 10)->default('')->index('idx_phone');
			$table->string('sn', 16)->default('')->index('idx_sn')->comment('資產編號');
			$table->boolean('version')->default(0)->index('idx_version')->comment('軟體版本');
			$table->boolean('rent_type')->default(0)->index('idx_rent_type');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店 group_id');
			$table->string('rent_name', 45)->default('')->index('idx_rent_name');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('建立(進貨)時間');
			$table->integer('rent_ts')->default(0)->index('idx_rent_ts')->comment('出借時間');
			$table->integer('back_ts')->default(0)->index('idx_back_ts')->comment('歸還時間');
			$table->string('memo')->nullable()->comment('備註');
			$table->integer('store_id')->default(0)->index('store_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mypad_log');
	}

}
