<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMgmPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('mgm_points', function(Blueprint $table)
		{
			$table->integer('mgm_points_id', true);
			$table->bigInteger('purchase_id')->index('idx_purchase_id')->comment('交易序號');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('兌換卷ID');
			$table->integer('re_id')->default(0)->index('idx_re_id')->comment('mapping gomaji.oneapp_reward_events_rule.re_id');
			$table->bigInteger('share_uid')->default(0)->index('idx_share_uid')->comment('分享者 gm_uid');
			$table->bigInteger('shared_uid')->default(0)->index('idx_shared_uid')->comment('被分享者 gm_uid');
			$table->integer('points')->default(0)->comment('贈點');
			$table->boolean('status')->default(0)->index('idx_status')->comment('0:符合資格未贈點, 1:已贈點, 2:其他筆資料已贈點, 負數:刪除');
			$table->timestamp('create_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
			$table->timestamp('update_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('更新時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('mgm_points');
	}

}
