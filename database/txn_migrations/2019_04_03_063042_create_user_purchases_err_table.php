<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPurchasesErrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('user_purchases_err', function(Blueprint $table)
		{
			$table->bigInteger('purchase_id', true)->comment('交易序號');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->bigInteger('gm_uid')->default(0)->index('idx_gm_uid')->comment('會員編號');
			$table->string('full_name', 45)->default('')->index('idx_full_name')->comment('交易當下記錄的姓名');
			$table->string('mobile_phone', 45)->default('')->index('idx_mobile_phone')->comment('交易當下記錄的電話');
			$table->string('email', 45)->default('')->index('idx_email')->comment('當下交易記錄的email');
			$table->char('agent_type', 8)->default('')->index('idx_agent_type')->comment('付費方式
payment.agent_type');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('商店ID');
			$table->integer('branch_id')->default(0)->comment('商品所屬之分店ID');
			$table->integer('money')->default(0)->comment('本次交易總金額
(=amount+use_bonus)');
			$table->integer('amount')->default(0)->comment('本次交易的實際金額(cash)');
			$table->integer('use_bonus')->default(0)->comment('本次交易折抵之購物金');
			$table->integer('use_pcode')->default(0);
			$table->integer('discount')->default(0);
			$table->smallInteger('use_points')->unsigned()->default(0)->comment('本次交易折抵之點數');
			$table->boolean('buy_number')->default(0)->comment('購買的份數');
			$table->boolean('refund_number')->default(0);
			$table->boolean('deal_flag')->default(0)->index('idx_deal_flag')->comment('交易狀態 [ 0:init / 1:pending / 2:paid / 3:fail / 4:refund / 其餘查flag_mapping ]');
			$table->integer('deal_ts')->default(0)->index('idx_deal_ts')->comment('交易時間');
			$table->integer('paid_ts')->default(0)->index('idx_paid_ts')->comment('請款完成付費)時間');
			$table->integer('refund_ts')->default(0);
			$table->integer('gmc_agent')->default(0)->index('idx_gmc_agent');
			$table->string('gmc_agent_type', 8)->default('')->index('idx_gmc_agent_type');
			$table->boolean('first_buy')->default(0);
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('bflag')->default(0);
			$table->string('pcode_prefix', 5)->default('')->index('idx_pcode_prefix');
			$table->string('site', 20)->default('')->index('idx_site');
			$table->boolean('plat')->default(0)->comment('平台來源 [對應值查 flag_mapping]');
			$table->boolean('inv_flag')->default(0);
			$table->integer('inv_amount')->default(0);
			$table->boolean('channel')->default(0);
			$table->integer('instant_id')->default(0)->index('idx_instant_id');
			$table->boolean('travel')->default(0)->index('idx_travel');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('du_id')->default(0);
			$table->string('memo')->nullable();
			$table->primary(['purchase_id','product_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('user_purchases_err');
	}

}
