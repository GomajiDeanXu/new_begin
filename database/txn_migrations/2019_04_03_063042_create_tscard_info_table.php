<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTscardInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tscard_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('type')->index('idx_type')->comment('1=夠麻吉，2=一起旅行');
			$table->char('agent_type', 16)->default('');
			$table->integer('merid')->comment('銀行端的商店代號');
			$table->string('merchantid', 20)->default('')->comment('MID');
			$table->string('terminalid', 20)->default('')->comment('TID');
			$table->string('api_root', 200)->default('')->comment('台新的 API_ROOT');
			$table->string('status', 15)->default('')->comment('環境狀態 dev 或 online');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tscard_info');
	}

}
