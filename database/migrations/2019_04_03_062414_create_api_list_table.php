<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('api_list', function(Blueprint $table)
		{
			$table->increments('list_id');
			$table->string('func', 32)->default('')->index('idx_func')->comment('用途');
			$table->string('device', 32)->default('')->index('idx_device')->comment('適用的裝置(版本)');
			$table->string('description')->default('')->comment('功能描述');
			$table->string('url')->default('')->comment('API 網址');
			$table->integer('ts')->unsigned()->comment('建立時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('(0: 不可使用 / 1: 可使用)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('api_list');
	}

}
