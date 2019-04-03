<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTotalRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('total_rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('store_id')->default(0);
			$table->string('branch_name', 45)->default('')->comment('分店名稱');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('gomaji.store_branch_total.branch_id');
			$table->boolean('bu_type')->default(0)->comment('類型1:RS/BB(總評價),2:ES/OTA,3: 全部 (1+2),4:ES/OTA (以store_id 角度),5:舊BB/買單優惠 (nfc後台用),6:RS/BB(一年內評價), 7:BT(以SID計算), 8:SH(以PID計算)');
			$table->float('avg_rating', 2, 1)->default(0.0)->index('idx_avg_rating')->comment('評價平均分數');
			$table->integer('rating_count')->default(0)->index('idx_rating_count')->comment('評價數');
			$table->string('comment_type', 45)->default('')->comment('評價特色');
			$table->string('comment_type_stat', 100)->nullable()->comment('評價特色數字');
			$table->integer('ranking')->nullable()->default(0)->comment('評價分數的百分比排名');
			$table->integer('update_ts')->default(0)->comment('更新時間');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('0: 停用
1: 正常');
			$table->integer('product_id')->default(0)->comment('gomaji.products.product_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('total_rating');
	}

}
