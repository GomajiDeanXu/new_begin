<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('card_info', function(Blueprint $table)
		{
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->integer('id', true);
			$table->string('merchantnumber', 8)->default('')->index('idx_merchantnumber');
			$table->string('code', 16)->default('');
			$table->string('rcode', 16)->default('');
			$table->string('url_pay')->default('');
			$table->string('url_mobile_pay')->default('');
			$table->string('url_adm')->default('');
			$table->string('url_feedback')->default('');
			$table->string('url_return')->default('');
			$table->string('status', 8)->default('')->index('idx_status');
			$table->string('ftp_server', 45)->default('');
			$table->string('npc_id', 16)->default('');
			$table->string('npc_pwd', 16)->default('');
			$table->string('npc_host_ip', 48)->default('');
			$table->string('npc_api_path', 48)->default('');
			$table->string('mid', 10)->default('');
			$table->binary('npwd');
				// ->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('card_info');
	}

}
