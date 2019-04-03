<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_info', function(Blueprint $table)
		{
			$table->increments('contact_info_id');
			$table->integer('store_contact_id')->unsigned()->default(0)->index('idx_store_contact_id')->comment('store_contact.store_contact_id');
			$table->integer('group_id')->unsigned()->default(0)->index('idx_group_id')->comment('對應store_branch_total.branch_id');
			$table->boolean('contact_type')->default(0)->comment('聯絡人類型');
			$table->string('contact_name', 45)->nullable()->comment('聯絡人姓名');
			$table->boolean('contact_gender')->default(0)->comment('聯絡人性別');
			$table->string('contact_title', 16)->nullable()->comment('聯絡人職稱');
			$table->string('contact_phone', 100)->nullable()->comment('聯絡人電話');
			$table->string('contact_email', 200)->nullable()->comment('聯絡人 E-mail');
			$table->string('contact_address', 45)->nullable()->comment('聯絡人地址');
			$table->text('contact_memo', 65535)->nullable()->comment('聯絡人備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_info');
	}

}
