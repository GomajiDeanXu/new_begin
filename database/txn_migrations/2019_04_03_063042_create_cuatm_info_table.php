<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuatmInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('cuatm_info', function(Blueprint $table)
		{
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->integer('id', true);
			$table->string('merchantnumber', 8)->default('')->index('idx_merchantnumber');
			$table->string('cust_id', 16)->default('');
			$table->string('cust_pwd', 16)->default('');
			$table->string('cust_nick', 16)->default('');
			$table->string('mccode', 45)->default('')->comment('特約商店代碼');
			$table->string('bankid', 45)->default('');
			$table->string('branchid', 16)->default('');
			$table->string('url_pay')->default('');
			$table->string('url_writeoff')->default('');
			$table->string('url_ap2ap')->default('');
			$table->string('url_query')->default('');
			$table->string('status', 8)->default('')->index('idx_status');
			$table->string('memo')->nullable()->comment('註解');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('cuatm_info');
	}

}
