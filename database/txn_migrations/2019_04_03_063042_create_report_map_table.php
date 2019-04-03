<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('report_map', function(Blueprint $table)
		{
			$table->integer('rid', true);
			$table->string('agent', 8)->default('')->index('idx_agent');
			$table->string('title', 48)->default('')->index('idx_title');
			$table->string('exp_name', 32)->default('');
			$table->integer('date_create')->default(0);
			$table->boolean('flag')->default(0)->index('idx_flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('report_map');
	}

}
