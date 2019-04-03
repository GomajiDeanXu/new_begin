<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdClientContactInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ad_client_contact_info', function(Blueprint $table)
		{
			$table->increments('contact_id')->comment('聯絡人ID');
			$table->integer('client_id')->unsigned()->default(0)->index('idx_client_id')->comment('廣告客戶ID (ad_client.client_id)');
			$table->boolean('type')->default(0)->index('idx_type')->comment('聯絡人類型 (1: 聯絡窗口 / 2: 財務窗口)');
			$table->string('name', 20)->default('')->comment('姓名');
			$table->boolean('gender')->default(0)->comment('性別 (1: 男 / 2: 女)');
			$table->string('phone', 30)->default('')->comment('電話');
			$table->string('mobile_phone', 30)->default('')->comment('手機');
			$table->string('fax', 20)->default('')->comment('傳真');
			$table->string('email', 45)->default('')->comment('e-mail');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ad_client_contact_info');
	}

}
