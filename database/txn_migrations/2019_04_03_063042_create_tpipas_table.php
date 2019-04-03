<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTpipasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tpipas', function(Blueprint $table)
		{
			$table->integer('tpipas_id', true);
			$table->boolean('type')->default(0)->comment('處理類別');
			$table->integer('gm_uid')->default(0)->index('idx_gm_uid');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->integer('create_ts')->default(0)->comment('處理時間');
			$table->string('reason')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tpipas');
	}

}
