<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorePickupLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_pickup_log', function(Blueprint $table)
		{
			$table->integer('sm_log_id', true);
			$table->integer('sm_detail_id')->default(0)->index('idx_sm_detail_id')->comment('對應gomaji.store_pickup_detail.sm_detail_id');
			$table->string('file_code', 10)->default('0')->comment('記錄接收的電文檔代號');
			$table->string('status', 3)->default('0')->comment('參照flag_mapping: 1 - 正常配送流程 1 - 正常配送流程 2 – 貨物遺失或破損，3 – 包裝不良（滲漏），4 – 其他: 異常提早退貨、分貨錯誤，5 – 店家未到貨');
			$table->string('status_details', 5)->default('0')->comment('參照flag_mapping,物流詳細狀態');
			$table->string('flow_type', 2)->default('0')->comment('N：進貨(正)，R：退貨(逆)');
			$table->string('receive_dt', 10)->nullable()->default('0')->comment('貨態時間');
			$table->integer('create_ts')->default(0)->comment('row data 建立時間');
			$table->string('modify_by', 20)->default('')->comment('記錄最後維護人員');
			$table->integer('modify_ts')->default(0)->comment('row data 修改時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_pickup_log');
	}

}
