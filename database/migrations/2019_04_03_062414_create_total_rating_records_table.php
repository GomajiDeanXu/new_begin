<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTotalRatingRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('total_rating_records', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('total_rating_id')->default(0)->index('idx_total_rating_id')->comment('total_rating.total_rating_id
');
			$table->integer('rating')->default(0)->comment('分數');
			$table->integer('rating_count')->default(0)->comment('評價人數總合');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('update_ts')->default(0)->comment('更新時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('total_rating_records');
	}

}
