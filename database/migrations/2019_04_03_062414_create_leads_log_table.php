<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leads_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->integer('store_contact_id')->default(0)->index('idx_store_contact_id')->comment('店家連絡資訊ID');
			$table->integer('manager_id')->default(0)->index('idx_manager_id')->comment('行銷顧問主管');
			$table->integer('sales_id')->default(0)->index('idx_sales_id')->comment('行銷顧問');
			$table->integer('last_contact_ts')->default(0)->comment('最後更新時間');
			$table->integer('type')->default(0)->comment('轉移原因');
			$table->integer('log_ts')->default(0)->index('idx_log_ts')->comment('轉移的時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leads_log');
	}

}
