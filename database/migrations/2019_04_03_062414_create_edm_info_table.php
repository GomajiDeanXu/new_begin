<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEdmInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('edm_info', function(Blueprint $table)
		{
			$table->increments('edm_id');
			$table->boolean('type')->default(0)->index('idx_type');
			$table->string('city_id')->index('idx_city_id');
			$table->string('subject');
			$table->integer('main_product')->unsigned();
			$table->integer('ts')->unsigned()->index('idx_ts');
			$table->integer('create_ts')->default(0);
			$table->text('content', 65535)->nullable();
			$table->boolean('flag')->nullable()->default(1);
			$table->integer('delete_ts')->nullable()->default(0);
			$table->string('deputy_product', 45)->nullable();
			$table->boolean('list_type')->nullable()->default(0)->comment('flag_mapping');
			$table->boolean('banner_display_type')->nullable()->default(0)->comment('1: 商品編號 2:連結位置');
			$table->string('banner_img')->nullable()->comment('banner圖片來源');
			$table->string('banner_link')->nullable()->comment('banner連結');
			$table->integer('banner_pid')->nullable()->comment('商品編號');
			$table->boolean('display_img_type')->default(0)->comment('圖片顯示方式 0:不顯示 1:使用預設圖片 2:使用上傳圖片');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('edm_info');
	}

}
