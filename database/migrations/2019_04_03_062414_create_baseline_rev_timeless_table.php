<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaselineRevTimelessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('baseline_rev_timeless', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('calc_month')->default(0)->comment('yyyymm計算月份');
			$table->string('geo', 50)->nullable()->comment('所屬的region 用products.city_id or ch=2 then spot.region (ref by products.spot_id)判');
			$table->string('main_type', 50)->nullable()->comment('主類別，tag_id or category_id判');
			$table->boolean('cycle')->default(0)->index('idx_cycle')->comment('頻道 products.channel');
			$table->integer('q3')->default(0)->comment('Q3');
			$table->integer('q2')->default(0)->comment('Q2');
			$table->integer('q1')->default(0)->comment('Q1');
			$table->integer('create_ts')->nullable()->comment('建立時間');
			$table->unique(['calc_month','geo','main_type','cycle'], 'index_combo');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('baseline_rev_timeless');
	}

}
