<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaMainInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ota_main_info', function(Blueprint $table)
		{
			$table->increments('id')->comment('id');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('sid');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('gid');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('城市id');
			$table->integer('sales_id')->default(0)->index('idx_sales_id')->comment('sales_id');
			$table->string('branch_name', 45)->nullable()->comment('分店名');
			$table->integer('verify_status')->nullable()->default(0)->comment('0: 未審核 / 1:已審核 / 2:退件/ 3:審核中');
			$table->string('refund_reason', 65)->nullable()->comment('退件理由');
			$table->integer('teach')->nullable()->default(0)->comment('0: 未教育訓練 / 1: 已教育訓練');
			$table->integer('teach_ts')->default(0)->index('idx_teach_ts')->comment('教育訓練時間');
			$table->integer('publish')->nullable()->default(0)->comment('0: 未上架 / 1: 已上架 / 2:已下架');
			$table->integer('publish_start_ts')->default(0)->index('idx_publish_start_ts')->comment('上架時間');
			$table->boolean('region')->default(0)->comment('地區(0: 未列入分區 / 1: 北部地區 / 2: 中部地區 / 3: 南部地區 / 4: 花東地區)');
			$table->integer('cooperation_ts')->default(0)->index('idx_cooperation_ts')->comment('不合作時間');
			$table->boolean('invoice_type')->default(0)->comment('店家請款方式');
			$table->boolean('sale_type')->default(0)->comment('銷售方式');
			$table->boolean('channel')->default(13)->index('idx_channel')->comment('頻道');
			$table->integer('create_ts')->nullable()->default(0)->index('create_ts')->comment('開通紀錄時間');
			$table->integer('flag')->nullable()->default(1)->comment('0: 未使用 / 1: 使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ota_main_info');
	}

}
