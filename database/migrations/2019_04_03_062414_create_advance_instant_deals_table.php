<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvanceInstantDealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advance_instant_deals', function(Blueprint $table)
		{
			$table->integer('aid_id', true)->comment('我餓了排程ID');
			$table->integer('store_contact_id')->default(0)->index('idx_store_contact_id')->comment('對應 store_contact 的店家');
			$table->integer('sales_id')->default(0)->comment('建立排程的行銷顧問ID');
			$table->string('publish_month', 7)->default('')->comment('上檔月份');
			$table->string('expiry_month', 7)->default('')->comment('下檔月份');
			$table->string('product_ids')->nullable()->index('idx_product_ids')->comment('排程建立的商品ID(一個排程可以建多個商品)');
			$table->string('adopt', 20)->nullable()->comment('認養人員帳號');
			$table->integer('date_create')->default(0)->comment('排程建立時間');
			$table->integer('flag')->default(0)->comment('(1:正常排程[未刪除] / 2: 素材已上傳 / 4: 需拍照)');
			$table->boolean('mypad')->default(0)->comment('店家持有的mypad台數(已無使用)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('advance_instant_deals');
	}

}
