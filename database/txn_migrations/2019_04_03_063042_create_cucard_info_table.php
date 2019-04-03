<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCucardInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('cucard_info', function(Blueprint $table)
		{
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->integer('id', true);
			$table->string('storeid', 10)->default('')->index('idx_merchantnumber');
			$table->char('cubkey', 32)->default('');
			$table->string('url_pay')->default('');
			$table->string('url_mobile_pay')->default('');
			$table->string('url_deposit')->default('');
			$table->string('url_confirm')->default('');
			$table->string('url_receiveorder')->default('');
			$table->string('url_refund')->default('');
			$table->string('url_query');
			$table->string('status', 8)->default('')->index('idx_status');
			$table->string('npc_id', 16)->default('');
			$table->string('npc_pwd', 8)->default('');
			$table->smallInteger('api_mode')->default(0)->comment('API模式 0：web url，1：API，2：3D');
			$table->binary('npwd')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('cucard_info');
	}

}
