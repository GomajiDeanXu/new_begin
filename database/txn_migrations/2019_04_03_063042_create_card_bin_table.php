<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardBinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('card_bin', function(Blueprint $table)
		{
			$table->char('bin', 6)->default('')->primary();
			$table->string('system_name', 8)->default('')->index('idx_system_name');
			$table->integer('flag')->default(1);
			$table->integer('create_ts')->default(0);
			$table->integer('bflag')->default(0)->comment('信用卡適用狀態(1:分期／2；3D)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('card_bin');
	}

}
