<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcodeAgentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('pcode_agent', function(Blueprint $table)
		{
			$table->integer('agent_id', true);
			$table->string('prefix', 4)->default('')->index('idx_prefix')->comment('字首(四碼大寫英數字)');
			$table->string('agent_code', 32)->default('')->index('idx_agent_code')->comment('子公司代號或是活動子代號');
			$table->integer('date_create')->default(0)->comment('資料建立日期');
			$table->boolean('flag')->default(0)->index('flag')->comment('資料識別');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('pcode_agent');
	}

}
