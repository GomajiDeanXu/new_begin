<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRatingHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rating_history', function(Blueprint $table)
		{
			$table->integer('rating_id')->unsigned()->default(0)->comment('user_rating.rating_id');
			$table->integer('coupon_id')->unsigned()->default(0)->index('idx_coupon_id')->comment('coupon.coupon_id');
			$table->integer('store_id')->unsigned()->default(0)->comment('store_info.store_id');
			$table->integer('product_id')->unsigned()->default(0)->comment('products.product_id');
			$table->integer('sp_id')->unsigned()->default(0)->comment('sub_products.sp_id');
			$table->integer('branch_id')->unsigned()->default(0)->comment('store_branch_info.branch_id');
			$table->bigInteger('bill_no')->default(0)->comment('user_purchases.bill_no');
			$table->integer('use_ts')->default(0)->comment('兌換券核銷時間 coupon.use_ts');
			$table->boolean('rating')->default(0)->comment('評價');
			$table->integer('review_id')->unsigned()->default(0)->comment('不滿意原因 low_rated_reviews.review_id');
			$table->string('comment', 240)->nullable()->comment('意見');
			$table->string('store_rs', 240)->nullable();
			$table->integer('rating_ts')->default(0)->comment('評價時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rating_history');
	}

}
