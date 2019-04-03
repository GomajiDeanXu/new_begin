<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('bank', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->char('bank_id', 8)->default('')->index('idx_bank_id')->comment('銀行代碼');
			$table->string('bank_name', 64)->default('')->comment('銀行名稱');
			$table->integer('bt_id')->default(0)->index('idx_bt_id')->comment('refer to bank_type.bt_id');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('1:有效，0:無效');
			$table->boolean('max_len')->default(0);
			$table->integer('bflag')->default(0)->comment('bitwise:1:退費必輸身份證字號');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('bank');
	}

}
