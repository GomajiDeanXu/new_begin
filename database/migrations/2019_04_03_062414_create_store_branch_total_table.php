<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreBranchTotalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_branch_total', function(Blueprint $table)
		{
			$table->integer('branch_id', true);
			$table->integer('store_id')->index('idx_sid')->comment('store_info.store_id');
			$table->string('branch_name', 60)->nullable()->comment('分店名');
			$table->string('branch_phone', 45)->nullable()->comment('電話');
			$table->string('branch_address', 60)->nullable()->comment('頁面顯示地址');
			$table->string('real_branch_address', 60)->nullable()->comment('地圖查詢地址');
			$table->string('branch_business_hours', 128)->nullable()->comment('營業時間');
			$table->integer('flag')->nullable()->default(1)->index('idx_flag')->comment('0: 刪除 / 1: 正常');
			$table->string('lat', 11)->default('')->comment('緯度');
			$table->string('lng', 11)->default('')->comment('經度');
			$table->string('postal_code', 5)->nullable()->comment('郵遞區號');
			$table->string('last_order_time', 128)->nullable()->comment('最晚預約或點餐時間');
			$table->string('email', 100)->default('')->comment('email');
			$table->integer('smer_id')->default(0)->index('idx_smer_id')->comment('對應mpay.store_merchant');
			$table->string('merchant_no', 16)->default('0')->comment('商店代號');
			$table->string('terminal_id', 16)->default('0')->comment('terminal_id');
			$table->integer('mer_id')->default(0)->comment('mer_id');
			$table->boolean('type')->default(1)->comment('1:分店資訊/2:展覽資訊');
			$table->integer('display')->default(1)->comment('控制分店顯示');
			$table->boolean('bflag')->default(0)->comment('0: 正常 / 1: 黑名單店家');
			$table->integer('gm_money')->default(0)->comment('店家行銷金');
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
		Schema::drop('store_branch_total');
	}

}
