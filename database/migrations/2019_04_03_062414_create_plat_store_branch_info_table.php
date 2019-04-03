<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatStoreBranchInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plat_store_branch_info', function(Blueprint $table)
		{
			$table->increments('psbi_id')->comment('系統流水號');
			$table->integer('branch_id')->comment('適用分店編號');
			$table->integer('product_id')->index('idx_pid')->comment('產品編號');
			$table->integer('sp_id')->index('idx_spid')->comment('方案編號');
			$table->integer('group_id')->default(0)->index('idx_gid')->comment('分店編號');
			$table->integer('price')->default(0)->comment('價格');
			$table->boolean('plat')->index('idx_plat')->comment('平台編號，對照 gomaji.plat_info');
			$table->string('plat_setting_id', 50)->nullable()->default('')->index('idx_plat_setting_id')->comment('平台適用分店設定編號');
			$table->string('plat_link', 50)->nullable()->default('')->comment('平台連結碼');
			$table->boolean('is_hidden')->default(0)->comment('是否隱藏');
			$table->string('plat_branch_name')->nullable()->comment('平台商品的適用分店名');
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
		Schema::drop('plat_store_branch_info');
	}

}
