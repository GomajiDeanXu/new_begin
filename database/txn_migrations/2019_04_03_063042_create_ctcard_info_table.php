<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCtcardInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ctcard_info', function(Blueprint $table)
		{
			$table->char('agent_type', 16);
			$table->integer('id', true);
			$table->integer('merid');
			$table->string('merchantid', 16);
			$table->string('terminalid', 16);
			$table->string('url_pay');
			$table->string('url_query');
			$table->string('url_input')->default('');
			$table->string('port', 8);
			$table->string('encrypt_key', 64)->default('');
			$table->integer('currency')->default(0);
			$table->boolean('exponent')->default(0);
			$table->integer('recur_end')->default(0);
			$table->string('status', 8);
			$table->string('mpi_url')->default('')->comment('3D MPI 身份驗證整合URL﹣中信');
			$table->string('mpi_returl')->default('')->comment('3D MPI 身份驗證結果回傳URL-GOMAJI');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ctcard_info');
	}

}
