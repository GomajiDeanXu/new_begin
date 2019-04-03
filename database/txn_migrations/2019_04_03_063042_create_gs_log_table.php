<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('gs_log', function(Blueprint $table)
		{
			$table->integer('gslog_id', true);
			$table->boolean('log_type')->nullable()->default(0)->comment('0:GOMAJI交易,1:生活交易');
			$table->integer('purchase_id')->default(0)->index('idx_purchase_id')->comment('交易序號');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('service_id', 45)->default('')->comment('客服人員');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->text('log', 65535)->comment('來電內容');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('gs_log');
	}

}
