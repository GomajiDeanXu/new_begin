<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShipmentsNoListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('shipments_no_list', function(Blueprint $table)
		{
			$table->integer('shipments_no_id', true)->comment('託運單號區段ID');
			$table->integer('start_no')->default(0)->comment('起始號碼');
			$table->integer('end_no')->default(0)->comment('截止號碼');
			$table->integer('create_ts')->default(0)->comment('資料建立日');
			$table->integer('alert_ts')->default(0)->comment('下次預計申請時間');
			$table->integer('use_cnt')->default(0)->comment('已使用筆數');
			$table->integer('total_cnt')->default(0)->comment('所有筆數');
			$table->string('flag', 45)->default('1')->index('idx_flag')->comment('資料標記(0:無效 / 1:有效 / 2:已使用完畢)');
			$table->integer('com_id')->default(1)->comment('物流商[1]:黑貓');
			$table->string('customer_id', 45)->default('2514564303')->comment('客戶代號');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('shipments_no_list');
	}

}
