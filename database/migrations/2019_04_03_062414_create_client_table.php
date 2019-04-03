<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client', function(Blueprint $table)
		{
			$table->integer('client_id', true);
			$table->string('client_name', 45)->default('')->comment('介接的廠商名稱');
			$table->string('client_key', 48)->default('')->comment('key');
			$table->boolean('flag')->default(0)->comment('(0: 不可使用 / 1: 可使用)');
			$table->string('exp', 45)->default('');
			$table->boolean('url')->default(0)->comment('(0: 沒建聯名網 / 1: 有建聯名網)');
			$table->string('bflag', 11)->nullable()->comment('api項目(1:商品資料  2: 核銷  4: 交易查詢)');
			$table->integer('create_ts')->nullable()->comment('建立時間');
			$table->string('full_name');
			$table->string('email');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client');
	}

}
