<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRatingProcessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rating_process', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('rating_id')->default(0)->index('idx_cc_id')->comment('user_rating.rating_id');
			$table->string('service_id', 45)->default('')->comment('申請人ID');
			$table->text('reason', 65535)->comment('申請刪除說明');
			$table->integer('create_ts')->default(0)->comment('申請時間');
			$table->string('top_id', 45)->default('')->comment('主管ID');
			$table->integer('update_ts')->default(0)->comment('更新時間');
			$table->integer('status')->default(0)->comment('狀態(-1:取消評價申請,-2:主管取消評價申請,1:申請評價申請,2:評價已完成刪除)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rating_process');
	}

}
