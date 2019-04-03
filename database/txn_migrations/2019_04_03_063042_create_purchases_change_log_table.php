<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesChangeLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('purchases_change_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('date_change')->default(0)->comment('變更時間');
			$table->boolean('type')->default(0)->index('idx_type')->comment('1:email / 2:mobile_phone / 3:full_name');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('org', 45)->default('')->comment('變更前之資料');
			$table->string('new', 45)->default('')->comment('變更後之資料');
			$table->string('service_id', 16)->nullable()->comment('客服帳號');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('purchases_change_log');
	}

}
