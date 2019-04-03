<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIbonInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ibon_info', function(Blueprint $table)
		{
			$table->char('agent_type', 8)->nullable();
			$table->integer('id', true);
			$table->string('url_pay')->nullable();
			$table->string('url_writeoff')->nullable();
			$table->string('status', 8)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ibon_info');
	}

}
