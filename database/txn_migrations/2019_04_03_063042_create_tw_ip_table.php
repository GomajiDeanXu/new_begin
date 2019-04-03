<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTwIpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tw_ip', function(Blueprint $table)
		{
			$table->string('start_ip_key', 16)->default('0')->comment('ip區段-起始');
			$table->integer('start_ip_value')->unsigned()->default(0)->index('idx_start_ip')->comment('ip區段-起始(轉碼後)');
			$table->string('end_ip_key', 16)->default('0')->comment('ip區段-結束');
			$table->integer('end_ip_value')->unsigned()->default(0)->index('idx_end_ip')->comment('ip區段-結束(轉碼後)');
			$table->integer('flag')->default(0)->index('idx_flag')->comment('狀態(1=正常，0＝關閉)');
			$table->string('comment', 200)->nullable()->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tw_ip');
	}

}
