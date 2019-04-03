<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundNoPaidPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('refund_no_paid_points', function(Blueprint $table)
		{
			$table->increments('rnpp_id')->comment('系統流水號');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('訂單序號');
			$table->boolean('trans_type')->default(0)->index('idx_trans_type')->comment('交易類別');
			$table->integer('gm_uid')->default(0)->index('idx_gm_uid')->comment('會員編號');
			$table->integer('refund_points')->default(0)->comment('返還點數');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('處理狀態，1=未處理，2=已處理，3=處理失敗');
			$table->integer('date_create')->default(0)->index('idx_date_create')->comment('建立時間');
			$table->integer('date_finish')->default(0)->index('idx_date_finish')->comment('處理完成時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('refund_no_paid_points');
	}

}
