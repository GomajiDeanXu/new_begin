<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVirtualBranchAccTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('virtual_branch_acc', function(Blueprint $table)
		{
			$table->integer('vb_id', true);
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('GROUP ID');
			$table->integer('acc_id')->default(0)->index('idx_acc_id')->comment('gomaji.store_verify_acc.auto_id');
			$table->string('password', 10)->comment('密碼');
			$table->string('vb_name', 45)->default('')->comment('分店名');
			$table->string('ea', 45)->default('');
			$table->boolean('flag')->default(1)->comment('1:有效，0:無效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('virtual_branch_acc');
	}

}
