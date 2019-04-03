<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserBonusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_bonus', function(Blueprint $table)
		{
			$table->integer('bonus_id', true);
			$table->bigInteger('gm_uid')->default(0)->index('idx_gm_uid')->comment('會員編號');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->integer('qid')->default(0)->comment('退費申請編號(deal_ququ.qid)');
			$table->integer('bonus_point')->default(0)->comment('轉出、入金額 [負數表示轉出]');
			$table->integer('verify_point')->default(0)->comment('核銷標記：記錄金額');
			$table->integer('refund_point')->default(0)->comment('退費標記：記錄金額');
			$table->integer('got_ts')->default(0)->index('idx_got_ts')->comment('轉出、入時間');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('轉出入標記 [ -1:刪除 / 1:轉入_消費者現金退費 / 2:轉入_商品到期現金轉入 / 3:轉入_團購金退費 / 4:轉入_ATM未轉帳退回 / 100:轉出_購買使用 / 101:轉出_團購金退回現金]');
			$table->boolean('ch')->default(0)->comment('gomaji.products.channel');
			$table->boolean('bu')->default(0)->comment('gomaji.sales.channel');
			$table->string('memo', 128)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_bonus');
	}

}
