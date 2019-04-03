<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ota_rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('transaction.coupon.coupon_id');
			$table->integer('store_id')->default(0)->comment('gomaji.store_info.store_id');
			$table->integer('version_id')->default(0)->index('idx_room_id')->comment('transaction.ota.version_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('gomaji.store_branch_total.branch_id');
			$table->integer('city_id')->default(0)->comment('城市id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('transaction.user_purchases.bill_no');
			$table->boolean('rating')->default(0)->index('idx_rating')->comment('評價分數');
			$table->string('comment')->default('')->comment('評價留言');
			$table->string('reply', 45)->default('')->comment('店家回覆');
			$table->integer('review_id')->unsigned()->default(0)->comment('不滿意原因 gomaji.low_rated_reviews.review_id');
			$table->integer('create_ts')->default(0)->comment('評價時間');
			$table->integer('reply_ts')->default(0)->comment('店家回覆時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0: 停用
1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ota_rating');
	}

}
