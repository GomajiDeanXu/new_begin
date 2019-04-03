<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('user_purchases', function(Blueprint $table)
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
			$table->integer('branch_id')->default(0)->comment('團購交易對應store_branch_info.branch_id,OTA交易對應store_branch_info.group_id');
			$table->integer('money')->unsigned()->default(0)->comment('訂單總金額');
			$table->integer('amount')->unsigned()->default(0)->comment('支付的現金');
			$table->integer('use_bonus')->unsigned()->default(0)->comment('使用的團購金');
			$table->integer('use_pcode')->unsigned()->default(0)->comment('使用的麻吉券');
			$table->integer('discount')->unsigned()->default(0)->comment('折扣金額');
			$table->smallInteger('use_points')->unsigned()->default(0)->comment('使用的點數');
			$table->boolean('buy_number')->default(0)->comment('購買的份數');
			$table->boolean('refund_number')->default(0)->comment('(累計)退費的份數');
			$table->boolean('deal_flag')->default(0)->index('idx_deal_flag')->comment('交易狀態 [ 0:init / 1:pending / 2:paid / 3:fail / 4:refund / 其餘查flag_mapping ]');
			$table->integer('deal_ts')->default(0)->index('idx_deal_ts')->comment('交易時間');
			$table->integer('paid_ts')->default(0)->index('idx_paid_ts')->comment('訂單(付費)完成時間');
			$table->integer('refund_ts')->default(0)->comment('最近一次退費時間');
			$table->integer('gmc_agent')->default(0)->index('idx_gmc_agent')->comment('推薦者');
			$table->string('gmc_agent_type', 8)->default('')->index('idx_gmc_agent_type')->comment('推薦來源類別');
			$table->boolean('first_buy')->default(0)->comment('首購標記 (flag_mapping)');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('兌換券產生標記');
			$table->integer('bflag')->default(0)->comment('bit wise (flag_mapping)');
			$table->string('pcode_prefix', 5)->default('')->index('idx_pcode_prefix')->comment('麻吉券字首');
			$table->string('site', 20)->default('')->index('idx_site')->comment('廣告來源');
			$table->boolean('plat')->default(0)->comment('平台來源 [對應值查 flag_mapping]');
			$table->boolean('inv_flag')->default(0)->comment('發票開立型式');
			$table->integer('inv_amount')->default(0)->comment('發票金額');
			$table->boolean('channel')->default(0)->comment('頻道 (gomaji.products.channel)');
			$table->integer('instant_id')->default(0)->index('idx_instant_id')->comment('我餓了時段 (gomaji.instant_deals.instant_id)');
			$table->boolean('travel')->default(0)->index('idx_travel')->comment('國旅卡標記 (flag_mapping)');
			$table->integer('sp_id')->default(0)->index('idx_sp_id')->comment('子方案 (gomaji.sub_products.sp_id)');
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
		Schema::connection('transaction')->drop('user_purchases');
	}

}
