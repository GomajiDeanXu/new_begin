<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChtatmVerifyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('chtatm_verify', function(Blueprint $table)
		{
			$table->integer('atm_id', true);
			$table->integer('cycle')->default(0)->index('idx_cycle')->comment('報表週期');
			$table->boolean('type')->default(0)->index('idx_type')->comment('1:請款 / 2:退款(沖正)');
			$table->integer('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->integer('date_cht')->default(0)->index('idx_date_cht')->comment('藍新報表的銷帳時間');
			$table->integer('amount')->default(0)->index('idx_amount')->comment('藍新報表的金額');
			$table->string('virtual_account', 20)->default('')->index('idx_virtual_account')->comment('授權碼');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('核對結果');
			$table->integer('date_gm')->default(0)->index('idx_date_gm')->comment('GOMAJI 記錄之付費時間');
			$table->integer('gm_amount')->default(0)->index('idx_gm_amount')->comment('GOMAJI 記錄之金額');
			$table->string('gm_status', 10)->default('')->comment('GOMAJI 記錄之狀態');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('chtatm_verify');
	}

}
