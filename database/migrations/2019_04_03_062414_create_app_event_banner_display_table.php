<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppEventBannerDisplayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_event_banner_display', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('app_event_banner_id')->default(0)->index('app_event_banner_id_idx')->comment('app特別企劃id');
			$table->integer('ch')->default(0)->index('ch_idx')->comment('頻道');
			$table->integer('sort')->default(0)->comment('排序');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_event_banner_display');
	}

}
