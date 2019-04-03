<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config_info', function(Blueprint $table)
		{
			$table->increments('ci_id');
			$table->string('config_desc', 200)->nullable()->default('')->comment('設定值的描述');
			$table->string('config_type', 50)->default('')->comment('設定值的類型(程式取用條件)');
			$table->integer('config_value')->nullable()->default(0)->comment('設定值(數字類型)');
			$table->float('ratio', 11, 4)->default(0.0000)->comment('設定值(浮點數類型)');
			$table->string('config_char', 100)->nullable()->default('')->comment('設定值(文字類型)');
			$table->integer('start_ts')->default(0)->comment('生效時間');
			$table->boolean('flag')->nullable()->default(1)->comment('1:有效，0:無效');
			$table->integer('create_ts')->nullable()->comment('建立時間');
			$table->boolean('redis_flag')->nullable()->default(0)->comment('1:存至redis 0:不存redis');
			$table->string('redis_key', 50)->nullable()->default('')->comment('redis對應key');
			$table->integer('redis_expiry_ts')->nullable()->default(0)->comment('redis存放期限');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('config_info');
	}

}
