<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rating', function(Blueprint $table)
		{
			$table->increments('rating_id');
			$table->integer('coupon_id')->unsigned()->default(0)->index('idx_coupon_id')->comment('coupon.coupon_id');
			$table->integer('store_id')->unsigned()->default(0)->index('idx_store_id')->comment('store_info.store_id');
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('sp_id')->unsigned()->default(0)->comment('sub_products.sp_id');
			$table->integer('branch_id')->unsigned()->default(0)->comment('store_branch_info.branch_id');
			$table->integer('group_id')->unsigned()->default(0)->index('idx_group_id')->comment('gomaji.store_branch_total.branch_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('user_purchases.bill_no');
			$table->integer('use_ts')->default(0)->comment('兌換券核銷時間 coupon.use_ts');
			$table->boolean('rating')->default(0)->comment('評價');
			$table->integer('review_id')->unsigned()->default(0)->comment('不滿意原因 low_rated_reviews.review_id');
			$table->string('comment', 240)->nullable()->comment('意見');
			$table->string('store_rs', 1000)->nullable();
			$table->integer('rating_ts')->default(0)->index('idx_rating_ts')->comment('評價時間');
			$table->integer('hardsell_timing')->default(0)->comment('推銷時間點(強迫推銷 1:服務前2:服務中3:服務後)');
			$table->string('rating_type', 64)->default('')->comment('特色推薦');
			$table->boolean('display')->default(1)->comment('評價顯示 0:隱藏 1:顯示');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rating');
	}

}
