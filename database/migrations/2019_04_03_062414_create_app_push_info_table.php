<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppPushInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_push_info', function(Blueprint $table)
		{
			$table->increments('pid');
			$table->boolean('city_id')->index('idx_city_id');
			$table->string('title')->nullable();
			$table->string('subject');
			$table->integer('main_product')->unsigned();
			$table->integer('ts')->unsigned()->index('idx_ts');
			$table->boolean('time_range')->default(0)->comment('訊息要發送的時段：０，早上１０點。１下午３點');
			$table->integer('ch')->default(0);
			$table->string('deeplink', 200)->nullable();
			$table->boolean('deeplink_type')->default(0);
			$table->integer('start_ts')->default(0);
			$table->integer('status_flag')->default(0)->index('idx_type');
			$table->integer('category_id')->default(0);
			$table->integer('tag_id')->default(0);
			$table->boolean('push_type')->default(1)->comment('發送名單類型');
			$table->integer('end_ts')->default(0);
			$table->integer('push_id')->default(0)->comment('gomaji.push_id_info.push_id');
			$table->string('push_img', 60)->nullable()->default('');
			$table->integer('push_complete')->unsigned()->default(0)->comment('推播完成時間');
			$table->integer('must_push')->default(0)->comment('強制推播');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_push_info');
	}

}
