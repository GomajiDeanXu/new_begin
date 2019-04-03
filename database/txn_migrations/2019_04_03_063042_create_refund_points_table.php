<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('refund_points', function(Blueprint $table)
		{
			$table->increments('rfp_id')->comment('系統流水號');
			$table->integer('qid')->default(0)->index('idx_qid')->comment('deal_queue 的 系統流水號');
			$table->integer('gm_uid')->default(0)->index('idx_gm_uid')->comment('會員編號');
			$table->boolean('type')->default(0)->index('idx_type')->comment('類別，1=有點數要退費也有扣回，2=只有要扣回');
			$table->boolean('trans_type')->default(0)->index('idx_trans_type')->comment('交易來源，1=團購或ＯＴＡ，2=ＢＢ或買單優惠');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('交易序號');
			$table->integer('refund_points')->default(0)->comment('要退款的點數');
			$table->boolean('status')->default(1)->index('idx_status')->comment('處理狀態，1=未處理，2=已處理，3=處理失敗');
			$table->integer('date_create')->default(0)->index('idx_date_create')->comment('建立時間');
			$table->integer('date_finish')->default(0)->comment('處理完成時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('refund_points');
	}

}
