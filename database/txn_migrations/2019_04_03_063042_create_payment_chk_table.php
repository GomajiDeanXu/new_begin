<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentChkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('payment_chk', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('system_name', 8)->default('');
			$table->integer('date_chk')->default(0)->index('idx_date_chk')->comment('對帳日期');
			$table->boolean('rs_gm')->default(0)->comment('gm 對帳結果：
0 : 未對
1 : OK
2 : 總表多(user_purchases)
3 : 子表多
4 : 兩者都有差異');
			$table->boolean('solve_gm')->default(0)->comment('是否已解決 rs_gm 的問題
0 : 無須處理
1 : 已解決
2 : 待處理');
			$table->boolean('rs_mp')->default(0)->comment('與 mp 對帳結果：
0 : 未對
1 : OK
2 : mp 多
3 : gm 多
4 : 兩者都有差異');
			$table->boolean('solve_mp')->default(0)->comment('是否已解決 rs_mp 的問題
0 : 無須處理
1 : 已解決
2 : 待處理');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('payment_chk');
	}

}
