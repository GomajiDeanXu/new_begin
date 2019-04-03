<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreBranchInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_branch_info', function(Blueprint $table)
		{
			$table->integer('branch_id', true);
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->integer('store_id')->index('idx_sid')->comment('store_info.store_id');
			$table->integer('product_id')->nullable()->index('idx_pid')->comment('products.product_id');
			$table->string('branch_name', 60)->nullable()->comment('分店名');
			$table->string('branch_phone', 45)->nullable()->comment('電話');
			$table->string('branch_address', 60)->nullable()->comment('頁面顯示地址');
			$table->string('list_phone', 45)->nullable()->comment('清冊連絡電話');
			$table->string('list_address', 45)->nullable()->comment('清冊寄送地址');
			$table->boolean('list_flag')->default(1)->comment('統一寄送清冊(若非統一寄送，所有分店皆為 1；統一寄送只有第一間分店為 1，其餘為 2)');
			$table->string('real_branch_address', 60)->nullable()->comment('地圖查詢地址');
			$table->string('branch_business_hours', 128)->nullable()->comment('營業時間');
			$table->integer('order_no')->default(0)->comment('目前購買數');
			$table->integer('max_order_no')->nullable()->default(0)->comment('購買數上限(0 為不限)');
			$table->integer('flag')->nullable()->default(1)->index('idx_flag')->comment('0: 刪除 / 1: 正常');
			$table->string('lat', 11)->default('')->comment('緯度');
			$table->string('lng', 11)->default('')->comment('經度');
			$table->string('postal_code', 5)->nullable()->comment('郵遞區號');
			$table->boolean('branch_order')->nullable();
			$table->string('last_order_time', 128)->nullable()->comment('最晚預約或點餐時間');
			$table->integer('order_no2')->nullable()->default(0);
			$table->integer('max_order_no2')->default(0);
			$table->text('prohibits', 65535)->nullable()->comment('禁止事項');
			$table->text('service_charge', 65535)->nullable()->comment('服務費');
			$table->text('credit_card', 65535)->nullable()->comment('信用卡');
			$table->text('other_notice', 65535)->nullable()->comment('其他注意事項');
			$table->text('website_link', 65535)->nullable()->comment('官網');
			$table->text('branch_fb', 65535)->nullable()->comment('粉絲團');
			$table->text('blog_search_keyword', 65535)->nullable()->comment('看部落客怎麼說');
			$table->boolean('closed_week')->comment('公休日＝>每週(1)、單週(2)、雙週(3)、第一週(4)、第二週(5)、第三週(6)、第四週(7)、第五週(8)');
			$table->string('closed_day', 16)->default('')->comment('公休星期幾');
			$table->string('closed_statement', 32)->default('')->comment('公休日說明');
			$table->string('avg_spend', 32)->default('')->comment('人均消');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_branch_info');
	}

}
