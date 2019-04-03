<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboundRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outbound_rating', function(Blueprint $table)
		{
			$table->integer('obr_id', true);
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('coupon.coupon_id');
			$table->integer('store_id')->default(0)->comment('store_info.store_id');
			$table->integer('plan_id')->default(0)->comment('outbound_order_detail.plan_id');
			$table->integer('group_id')->default(0)->comment('store_branch_total.branch_id');
			$table->integer('purchase_id')->default(0)->comment('訂單編號外來鍵');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('transaction.user_purchases.bill_no');
			$table->boolean('rating')->default(0)->comment('評價分數');
			$table->string('comment')->default('')->comment('評價留言');
			$table->string('reply', 45)->default('')->comment('店家回覆');
			$table->integer('review_id')->unsigned()->default(0)->comment('不滿意原因 gomaji.low_rated_reviews.review_id');
			$table->dateTime('create_ts')->default('0000-00-00 00:00:00')->comment('評價時間');
			$table->dateTime('reply_ts')->default('0000-00-00 00:00:00')->comment('店家回覆時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0: 停用
1: 正常');
			$table->string('rating_type', 64)->default('')->comment('特色推薦');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outbound_rating');
	}

}
