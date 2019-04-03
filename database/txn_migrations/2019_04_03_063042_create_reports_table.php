<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('reports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('rid')->default(0)->index('idx_rid');
			$table->integer('number')->default(0);
			$table->integer('date_create')->default(0)->index('idx_date_create');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('reports');
	}

}
