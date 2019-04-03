<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerComplaintProcessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_complaint_process', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('cc_id')->default(0)->index('idx_cc_id')->comment('customer_complaint.cc_id');
			$table->string('service_id', 45)->default('')->comment('處理客訴CRM帳號');
			$table->text('result', 65535)->comment('處理回覆或結果');
			$table->integer('result_ts')->default(0)->comment('處理時間');
			$table->integer('type')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_complaint_process');
	}

}
