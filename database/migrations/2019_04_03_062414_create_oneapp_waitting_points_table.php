<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappWaittingPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_waitting_points', function(Blueprint $table)
		{
			$table->increments('wp_id')->comment('系統流水號');
			$table->boolean('event_type')->comment('參考flag_mapping , column_name=event_type');
			$table->integer('re_id')->default(0)->index('idx_re_id')->comment('oneapp_reward_events_rule.re_id');
			$table->string('ch_id', 40)->nullable()->default('')->index('idx_ch_id')->comment('頻道（channel_map.channel)');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家編號');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店編號');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('purchase_id')->unsigned()->default(0)->comment('交易序號');
			$table->bigInteger('gm_uid')->default(0)->comment('user_purchases.gm_uid');
			$table->boolean('point_type')->comment('1=指定點數,2=百分比');
			$table->float('cash', 11, 4)->default(0.0000)->comment('支付的現金(含團購金)');
			$table->float('get_points', 11, 4)->default(0.0000)->comment('贈點的點數或百分比');
			$table->float('get_actual_points', 11, 4)->default(0.0000)->comment('實得點數(已完成換算)');
			$table->dateTime('expirydate')->nullable();
			$table->dateTime('expirydate')
			->default('0000-00-00 00:00:00')->comment('指定點數到期日')->change();
			$table->boolean('expirydays')->default(0)->comment('指定點數到期天數');
			$table->boolean('get_points_first_flag')->nullable()->default(0)->comment('是否先贈點 (0=兌換券全收核銷後給點，1=交易成單給點，2=單張兌換券核銷後給點)');
			$table->boolean('combine')->default(0)->comment('0=不可合併,1=可以合併');
			$table->boolean('refundrecovery')->default(0)->comment('0=退費後不可取消贈點資格,1=退費後可以取消贈點資格');
			$table->boolean('repeated')->default(0)->comment('0=每筆都贈點1=限制起迄日內贈一次 2=限制起迄日ob BySID/GID/PID贈一次');
			$table->boolean('filterid_type')->nullable()->default(0)->comment('1: filter_id=sid(暫未使用), 2:filter_id=gid,3:filter_id=pid');
			$table->dateTime('create_ts')->comment('建立日期時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_waitting_points');
	}

}
