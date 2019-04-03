<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCashInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('cash_info', function(Blueprint $table)
		{
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->integer('id', true);
			$table->string('merchantnumber', 8)->default('')->index('idx_merchantnumber');
			$table->string('code', 16)->default('');
			$table->string('bankid', 4)->default('');
			$table->string('url_pay')->default('');
			$table->string('url_writeoff')->default('');
			$table->string('url_adm')->default('');
			$table->string('url_query')->default('');
			$table->string('status', 8)->default('')->index('idx_status');
			$table->string('ftp_server', 16)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('cash_info');
	}

}
