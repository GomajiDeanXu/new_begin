<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plat_branch', function(Blueprint $table)
		{
			$table->increments('pb_id')->comment('系統流水號');
			$table->integer('store_id')->index('idx_sid')->comment('store_info.store_id');
			$table->integer('group_id')->index('idx_gid')->comment('store_branch_total.branch_id');
			$table->boolean('plat')->index('idx_plat')->comment('平台編號，對照 gomaji.plat_info');
			$table->string('plat_branch_id', 50)->nullable()->default('')->index('idx_plat_branch_id')->comment('平台分店流水號');
			$table->boolean('is_hidden')->default(0)->index('idx_is_hidden')->comment('是否隱藏');
			$table->boolean('is_deleted')->default(0)->index('idx_is_deleted')->comment('是否已從平台刪除');
			$table->timestamp('create_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
			$table->timestamp('modify_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('異動時間');
			$table->dateTime('delete_time')->nullable()->comment('刪除時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plat_branch');
	}

}
