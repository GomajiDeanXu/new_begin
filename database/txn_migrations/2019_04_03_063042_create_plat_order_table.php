<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('plat_order', function(Blueprint $table)
		{
			$table->increments('po_id')->comment('系統流水號');
			$table->boolean('plat')->index('idx_plat')->comment('平台編號，對照 gomaji.plat_info');
			$table->string('plat_order_id', 50)->nullable()->default('')->index('idx_plat_order_id')->comment('平台訂單編號');
			$table->integer('purchase_id')->index('idx_purchase_id')->comment('user_purchases.purchase_id');
			$table->timestamp('create_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
			$table->timestamp('modify_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('異動時間');
			$table->dateTime('delete_time')->nullable()->comment('刪除時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('plat_order');
	}

}
