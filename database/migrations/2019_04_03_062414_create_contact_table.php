<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact', function(Blueprint $table)
		{
			$table->integer('contact_id', true);
			$table->boolean('type')->default(0)->comment('主題(1: 網站問題或建議 / 2: 店家合作 / 3: 友站合作提案 / 4: 退費)');
			$table->string('email', 45)->default('')->comment('消費者 email');
			$table->string('full_name', 45)->default('')->comment('消費者');
			$table->text('content', 65535)->comment('內容');
			$table->integer('contact_ts')->comment('寄信時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact');
	}

}
