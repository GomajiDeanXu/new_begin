<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTpipasDpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tpipas_dp', function(Blueprint $table)
		{
			$table->integer('tpipas_dp_id', true);
			$table->integer('tpipas_id')->default(0)->index('idx_tpipas_id')->comment('tpipas.tpipas_id');
			$table->string('db_name', 45);
			$table->string('table_name', 45)->index('idx_table_name');
			$table->string('full_name', 45)->nullable();
			$table->string('mobile_phone', 45)->nullable();
			$table->string('email', 45)->nullable();
			$table->string('address')->default('');
			$table->integer('device_serial')->default(0)->comment('m4300.device.device_serial');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tpipas_dp');
	}

}
