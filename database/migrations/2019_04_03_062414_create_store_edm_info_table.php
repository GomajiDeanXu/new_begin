<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreEdmInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_edm_info', function(Blueprint $table)
		{
			$table->integer('edm_id', true);
			$table->string('mail_subject')->default('');
			$table->string('edm_subject')->default('');
			$table->text('content', 65535);
			$table->string('img_url')->default('');
			$table->string('extend_url')->default('');
			$table->integer('ad_send_ts')->default(0);
			$table->string('ad_show_date', 45)->default('\'\'');
			$table->integer('create_ts')->default(0);
			$table->boolean('type')->default(0)->comment('1:新聞訊息
2:生活剪影');
			$table->boolean('order_no')->default(0);
			$table->boolean('flag')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_edm_info');
	}

}
