<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentProductsVerifyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_products_verify', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('present_id')->unsigned()->default(0)->index('idx_present_id')->comment('present_products.present_id');
			$table->integer('identity')->unsigned()->default(0)->comment('身分 1 顧問 2 主管');
			$table->integer('verify_id')->unsigned()->default(0)->index('idx_verify_id');
			$table->integer('verify')->default(0)->comment('審核狀態 1 通過 －1 退件');
			$table->string('memo')->comment('備註');
			$table->string('reject_type')->comment('退件原因');
			$table->string('reject_memo')->comment('退件備註');
			$table->string('gc_command')->comment('GC注意事項');
			$table->string('qc_command')->comment('QC注意事項');
			$table->string('sp_command')->comment('SP注意事項');
			$table->string('notes_for_reporter')->comment('注意事項');
			$table->string('gw_command')->comment('GW注意事項');
			$table->string('gpa_command')->comment('GPA注意事項');
			$table->integer('create_ts')->unsigned()->default(0)->comment('審核時間');
			$table->boolean('flag')->comment('1.有效:0.無效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_products_verify');
	}

}
