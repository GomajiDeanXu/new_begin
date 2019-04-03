<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpApiLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sp_api_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('api_name', 50)->default('')->comment('API名稱');
			$table->text('api_param', 65535)->comment('API參數');
			$table->text('api_return', 65535)->comment('API 回傳結果');
			$table->string('status')->default('')->comment('API回傳狀態');
			$table->string('message')->default('')->comment('API回傳訊息');
			$table->integer('create_ts')->default(0)->comment('row data 建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sp_api_log');
	}

}
