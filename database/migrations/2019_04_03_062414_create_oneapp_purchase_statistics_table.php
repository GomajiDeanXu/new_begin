<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappPurchaseStatisticsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_purchase_statistics', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家id, gomaji.store_info.store_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('店家分店id, gomaji.store_branch_total.branch_id');
			$table->integer('mbranch_id')->default(0)->index('idx_mbranch_id')->comment('買單店家id, m4300.branch.mbranch_id');
			$table->integer('hotel_id')->default(0)->index('idx_hotel_id')->comment('hotel id, ota.hotel.id');
			$table->boolean('purchase_type')->default(0)->index('idx_purchase_type')->comment('訂單類型，1: 買單優惠');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle')->comment('統計日期');
			$table->integer('order_number')->default(0)->comment('訂單總筆數');
			$table->integer('total_money')->default(0)->comment('訂單總金額');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_purchase_statistics');
	}

}
