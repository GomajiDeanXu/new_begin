<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_finance', function(Blueprint $table)
		{
			$table->integer('sf_id', true)->comment('店家請款ID');
			$table->boolean('channel')->default(0)->index('channel')->comment('頻道');
			$table->boolean('delivery')->default(0)->comment('宅配');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品ID');
			$table->integer('store_id')->default(0)->index('store_id')->comment('店家ID');
			$table->string('store_name', 45)->index('store_name')->comment('店家名稱');
			$table->integer('publish_ts')->default(0)->index('publish_ts')->comment('上架日');
			$table->integer('expiry_ts')->default(0)->index('expiry_ts')->comment('下架日');
			$table->string('invoice_id', 45)->index('invoice_id')->comment('店家統編');
			$table->integer('money_sell')->default(0)->comment('銷貨總額');
			$table->integer('money_verify')->default(0)->comment('核銷總額');
			$table->integer('money_split')->default(0)->comment('店家應開立發票/收據金額');
			$table->integer('money_split_gm')->default(0)->comment('GOMAJI請款金額');
			$table->integer('money_refund')->default(0)->comment('退費總額');
			$table->integer('sale_number')->default(0)->comment('銷售份數');
			$table->integer('verify_number')->default(0)->comment('核銷份數');
			$table->integer('unverify_number')->default(0)->comment('反核銷份數');
			$table->integer('refund_number')->default(0)->comment('退費份數');
			$table->string('summons_no', 45)->index('summons_no')->comment('傳票編號');
			$table->string('acc_code', 45)->index('acc_code')->comment('文中_客供商代號');
			$table->integer('create_ts')->default(0)->index('create_ts')->comment('建立時間');
			$table->integer('close_ts')->default(0)->index('close_ts')->comment('結案時間');
			$table->integer('requistion_ts')->default(0)->comment('請款時間');
			$table->integer('inv_ts')->default(0)->comment('發票開立日期');
			$table->integer('discount_ts')->default(0)->comment('折讓單開立日期');
			$table->string('memo')->nullable()->comment('備註');
			$table->string('memo2')->nullable()->comment('備註2(異動備註:狀態_異動者id_異動時間)');
			$table->integer('flag')->default(0)->index('idx_flag')->comment('店家請款狀態
0:舊版 未執行
1:正常
2:新版 預覽
3: 刪除');
			$table->integer('type')->default(1)->index('type')->comment('資料類型(1:SH收付款資料2:LB收付款資料3:ES_GA收付款資料4:ES_HA付款資料5:ES_HA請款資料6:ID收付款資料)');
			$table->integer('branch_id')->default(0)->index('branch_id');
			$table->integer('b_flag')->default(0)->index('b_flag');
			$table->integer('trust_flag')->default(1)->index('trust_flag');
			$table->integer('b_flag_ts')->default(0)->index('b_flag_ts');
			$table->integer('in_full')->default(0)->index('in_full');
			$table->integer('allocate_ts')->default(0)->index('allocate_ts');
			$table->integer('finish_ts')->default(0)->index('idx_finish_ts');
			$table->integer('delivery_cost')->default(0)->comment('物流費扣款金額');
			$table->integer('verify_cost')->default(0)->comment('非當期反核銷金額');
			$table->integer('init_fee')->default(0)->comment('SH行銷贊助費');
			$table->integer('pickup_cost')->default(0)->comment('超取物流費扣款金額');
			$table->integer('edi')->default(0)->index('edi');
			$table->integer('sfg_id')->default(0)->index('idx_sfg_id')->comment('store_finance_group.sfg_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_finance');
	}

}
