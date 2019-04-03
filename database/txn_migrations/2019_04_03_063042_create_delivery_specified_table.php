<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliverySpecifiedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_specified', function(Blueprint $table)
		{
			$table->integer('delivery_sid', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('訂單序號');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->integer('com_id')->default(0)->index('idx_com_id')->comment('物流商[1:黑貓 / 2:宅配通]');
			$table->integer('date_create')->default(0)->comment('新增日期');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('資料有效值[0:無效資料 / 1:有效資料]');
			$table->boolean('shipments')->default(0)->index('idx_shipments')->comment('是否已填託運單號');
			$table->string('shipments_no', 45)->default('')->comment('託運單號');
			$table->integer('date_shipments')->default(0)->index('idx_date_shipments')->comment('出貨日期(填託運單號日期)');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('PID');
			$table->integer('item')->default(0)->index('idx_item')->comment('計價件數');
			$table->integer('reverse_item')->default(0)->index('idx_reverse_item')->comment('逆物流件數');
			$table->integer('pick_up_ts')->default(0)->index('idx_pick_up_ts')->comment('預計至店家取件日期');
			$table->integer('process_ts')->default(0)->index('idx_process_ts')->comment('處理日期');
			$table->integer('close')->default(0)->index('idx_close')->comment('結案與否 [0:未結案 / 1:結案]');
			$table->string('status', 45)->default('')->index('idx_status')->comment('物流回覆代碼');
			$table->integer('data_flag')->default(0)->index('idx_data_flag')->comment('資料拋轉處理標記 [0:未拋轉 / 1:已拋轉]');
			$table->integer('batch_no')->default(0)->index('idx_batch_no')->comment('列印批號');
			$table->integer('batch_flag')->default(0)->index('idx_batch_flag')->comment('列印標記(0:未列印 / 1:已列印)');
			$table->integer('type')->default(1)->index('idx_type')->comment('物流類型[1:一般物流 / 2:逆物流]');
			$table->integer('insert_flag')->default(1)->index('idx_insert_falg')->comment('新增類型[1:系統新增 / 2:店家後台新增]');
			$table->integer('fee')->default(0)->comment('物流費用(根據物流商的配送規格及溫層對應費用)');
			$table->integer('delivery_cycle')->default(0)->index('idx_delivery_cycle');
			$table->integer('delivery_flag')->default(0)->index('idx_delivery_flag');
			$table->integer('finish_ts')->default(0);
			$table->integer('shipments_type')->default(0)->index('shipments_type');
			$table->integer('size')->default(0)->index('size');
			$table->integer('com_fee')->default(0)->index('com_fee');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_specified');
	}

}
