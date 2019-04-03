<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('bank_branch', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->char('bb_id', 16)->default('')->index('idx_bb_id')->comment('分行代碼');
			$table->string('bank_branch_name', 64)->default('')->comment('分行名稱');
			$table->char('bank_id', 8)->default(0)->index('idx_bank_id')->comment('銀行代碼');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('1:有效，0:無效');
			$table->unique(['bank_id','bb_id'], 'idx_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('bank_branch');
	}

}
