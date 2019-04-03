<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerComplaintTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_complaint', function(Blueprint $table)
		{
			$table->integer('cc_id', true);
			$table->integer('cc_category_id')->default(0)->index('idx_cc_category_id');
			$table->boolean('channel')->default(0);
			$table->boolean('need_response')->default(0)->comment('是否需回覆(0: 否 / 1: 是)');
			$table->text('question', 65535)->comment('客訴內容');
			$table->text('remark', 65535)->comment('客訴備註');
			$table->boolean('status')->default(0)->index('idx_status')->comment('客訴狀態(0: 待處理 / 1: 結案 / 2: 刪單)');
			$table->integer('create_ts')->default(0)->comment('建單時間');
			$table->string('creator', 45)->default('')->comment('建立客訴人員');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->string('full_name', 45)->default('')->comment('客訴人姓名');
			$table->string('mobile_phone', 45)->default('')->comment('客訴人電話');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('客訴地區');
			$table->string('store_name', 45)->default('')->comment('店家名稱');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品代碼');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家代碼');
			$table->integer('result_ts')->default(0)->comment('結案時間');
			$table->string('closed_user', 45)->default('');
			$table->boolean('source')->default(0);
			$table->integer('limit_ts')->default(0);
			$table->text('limit_log', 65535);
			$table->boolean('response_status')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_complaint');
	}

}
