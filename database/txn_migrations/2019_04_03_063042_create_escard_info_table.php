<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEscardInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('escard_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('com', 3)->default('')->comment('gmj : 夠麻吉 / gmt : 一起旅行');
			$table->char('agent_type', 16)->default('')->index('idx_agent_type')->comment('銀行代理類型');
			$table->string('firmid', 4)->default('')->comment('系統廠商代號');
			$table->string('merchantid', 15)->default('')->index('idx_merchantid')->comment('特店代碼(MID)');
			$table->string('terminalid', 20)->default('')->comment('終端機代號(TID): 一般交易-EC000001 / 分期交易-EC000002');
			$table->string('url_pay')->default('')->comment('授權傳送網址');
			$table->string('url_query')->default('')->comment('查詢訂單網址');
			$table->char('esbkey', 32)->default('')->comment('押碼KEY');
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
		Schema::connection('transaction')->drop('escard_info');
	}

}
