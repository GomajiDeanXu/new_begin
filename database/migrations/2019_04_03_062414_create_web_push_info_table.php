<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWebPushInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('web_push_info', function(Blueprint $table)
		{
			$table->increments('wp_id')->comment('系統流水號');
			$table->bigInteger('gm_uid')->default(0)->index('idx_gm_uid')->comment('gomaji.user.gm_uid');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('城市ID gomaji.city.city_id');
			$table->text('subscription', 65535)->comment('瀏覽器 subscribe json format');
			$table->string('auth', 100)->default('')->index('auth');
			$table->timestamp('create_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('web_push_info');
	}

}
