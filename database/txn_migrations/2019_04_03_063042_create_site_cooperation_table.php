<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteCooperationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('site_cooperation', function(Blueprint $table)
		{
			$table->integer('site_id', true);
			$table->string('site', 20)->default('')->index('idx_site_name');
			$table->string('site_ch_name', 45)->default('')->comment('合作商中文名稱');
			$table->integer('date_create')->default(0);
			$table->float('rate', 6, 3)->default(0.000);
			$table->boolean('del')->default(0)->index('idx_del');
			$table->boolean('ver')->default(1)->index('idx_ver');
			$table->integer('date_stop')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('site_cooperation');
	}

}
