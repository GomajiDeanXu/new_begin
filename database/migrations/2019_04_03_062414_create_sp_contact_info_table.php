<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpContactInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sp_contact_info', function(Blueprint $table)
		{
			$table->integer('sp_contact_id', true);
			$table->string('sm_store_id', 20)->default('0')->index('idx_sm_store_id')->comment('超商門市代號(對應gomaji.sp_shop_info.sm_store_id)');
			$table->boolean('contact_type')->default(1)->comment('1.退件聯絡人');
			$table->string('contact_name', 45)->default('0')->comment('退件聯絡人姓名');
			$table->string('contact_email', 50)->default('0')->comment('退件聯絡人信箱');
			$table->string('contact_phone', 30)->default('0')->comment('退件聯絡人電話');
			$table->string('contact_address', 45)->default('0')->comment('退件聯絡人地址');
			$table->integer('create_ts')->default(0)->comment('row data 建立時間');
			$table->string('modify_by', 20)->default('')->comment('記錄最後維護人員');
			$table->integer('modify_ts')->default(0)->comment('row data 修改時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sp_contact_info');
	}

}
