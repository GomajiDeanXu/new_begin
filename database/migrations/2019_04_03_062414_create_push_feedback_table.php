<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePushFeedbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('push_feedback', function(Blueprint $table)
		{
			$table->integer('feedback_id', true);
			$table->integer('push_id')->default(0)->index('idx_push_id');
			$table->boolean('ot')->default(0);
			$table->integer('send_num')->default(0);
			$table->integer('click_num')->default(0);
			$table->integer('receive_num')->default(0);
			$table->integer('feedback_date_ts')->default(0)->index('idx_feedback_date_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('push_feedback');
	}

}
