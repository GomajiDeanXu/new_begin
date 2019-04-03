<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdClientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ad_client', function(Blueprint $table)
		{
			$table->increments('client_id')->comment('廣告客戶ID');
			$table->integer('sales_id')->unsigned()->default(0)->index('idx_sales_id')->comment('行銷顧問ID');
			$table->boolean('client_type')->default(0)->index('idx_client_type')->comment('客戶類型 (1: 直客 / 2: 代理商)');
			$table->string('client_name', 45)->default('')->comment('客戶名稱');
			$table->string('address', 60)->default('')->comment('公司地址');
			$table->integer('category_id')->unsigned()->default(0)->comment('廣告分類ID (product_category.category_id)');
			$table->string('invoice_id', 8)->default('')->comment('統一編號');
			$table->string('invoice_title', 40)->default('')->comment('發票抬頭');
			$table->string('invoice_address', 60)->default('')->comment('發票地址');
			$table->boolean('payment_type')->default(0)->comment('付款方式 (1: 現金 / 2: 匯款 / 3: 支票)');
			$table->string('payment_description', 60)->default('')->comment('付款說明');
			$table->boolean('contact_status')->default(0)->index('idx_contact_status')->comment('開發狀態');
			$table->string('contract_file', 120)->default('')->comment('合約檔案');
			$table->text('contract_description', 65535)->nullable()->comment('合約說明');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ad_client');
	}

}
