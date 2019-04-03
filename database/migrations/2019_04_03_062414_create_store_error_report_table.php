<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreErrorReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_error_report', function(Blueprint $table)
		{
			$table->increments('ser_id');
			$table->integer('store_id')->unsigned()->nullable()->default(0)->index('idx_store_id');
			$table->boolean('report_type')->nullable()->default(0);
			$table->integer('branch_id')->unsigned()->nullable()->default(0)->index('idx_branch_id');
			$table->string('branch_address');
			$table->string('branch_business_hours');
			$table->string('ip', 24)->default('0');
			$table->integer('ts')->unsigned()->nullable()->default(0);
			$table->boolean('flag')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_error_report');
	}

}
