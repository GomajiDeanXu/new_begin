<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plat_products', function(Blueprint $table)
		{
			$table->increments('pp_id')->comment('系統流水號');
			$table->integer('product_id')->index('idx_pid')->comment('產品編號');
			$table->integer('sp_id')->index('idx_spid')->comment('方案編號');
			$table->boolean('plat')->index('idx_plat')->comment('平台編號，對照 gomaji.plat_info');
			$table->string('plat_product_id', 50)->nullable()->default('')->index('idx_plat_pid')->comment('平台產品編號');
			$table->string('plat_category_id', 50)->nullable()->default('')->comment('平台分類編號');
			$table->boolean('process')->nullable()->default(0)->index('idx_category_changed')->comment('商品上架進度');
			$table->string('product_name', 254)->nullable()->comment('商品名稱');
			$table->text('description', 65535)->nullable()->comment('商品描述');
			$table->text('attributes', 65535)->nullable()->comment('其他屬性(json字串)');
			$table->boolean('status')->default(0)->comment('API feedback狀態，0:未新增，1:新增成功，2:新增失敗，3:更新成功，4:更新失敗');
			$table->boolean('is_hidden')->default(0)->comment('是否隱藏');
			$table->boolean('is_deleted')->default(0)->index('idx_is_deleted')->comment('是否已從平台刪除');
			$table->timestamp('create_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
			$table->timestamp('modify_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('異動時間');
			$table->dateTime('delete_time')->nullable()->comment('刪除時間');
			$table->string('editor', 20)->nullable()->comment('編輯者');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plat_products');
	}

}
