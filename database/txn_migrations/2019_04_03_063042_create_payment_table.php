<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('payment', function(Blueprint $table)
		{
			$table->integer('agent_id', true);
			$table->string('agent_name', 45)->nullable()->comment('付費名稱');
			$table->char('agent_type', 10)->nullable()->index('idx_agent_type')->comment('card\natm\nwebatm');
			$table->boolean('flag')->nullable()->index('idx_flag')->comment('是否為上線？
1 : 上線
0 : 下線');
			$table->string('system_name', 10)->default('')->index('idx_system_name')->comment('payment子表名稱');
			$table->char('com', 3)->default('')->index('idx_com');
			$table->char('com_no', 8)->default('')->index('idx_com_no');
			$table->char('bank_id', 4)->default('');
			$table->string('bank_name', 64)->default('');
			$table->string('agent_payment_alias_name', 12)->nullable()->comment('App 付費明細顯示的名稱');
			$table->string('system_alias_name', 20)->default('')->comment('別名');
			$table->integer('bflag')->default(0)->comment('bitwise (flag_mapping)');
			$table->smallInteger('refund_days')->nullable()->default(0)->comment('各銀行的可退費天數');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('payment');
	}

}
