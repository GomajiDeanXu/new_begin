<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRivalReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rival_report', function(Blueprint $table)
		{
			$table->increments('rr_id');
			$table->integer('rival_id')->unsigned()->default(0)->index('idx_rival_id')->comment('rival.rival_id');
			$table->string('pid', 40)->nullable()->index('idx_pid')->comment('rival_products_2.pid');
			$table->integer('total_buy_number')->unsigned()->default(0)->comment('購買數');
			$table->integer('price')->unsigned()->default(0)->comment('特價');
			$table->integer('total_money')->unsigned()->default(0)->comment('銷售金額');
			$table->integer('rpt_ts')->unsigned()->default(0)->index('idx_rpt_ts')->comment('報表時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rival_report');
	}

}
