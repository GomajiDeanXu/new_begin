<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuy123EdmInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buy123_edm_info', function(Blueprint $table)
		{
			$table->integer('edm_id', true)->comment('PRIMARY KEY');
			$table->string('subject')->default('')->comment('edm 主旨');
			$table->dateTime('edm_date')->index('idx_edm_date')->comment('edm 發送日期')->nullable();
			$table->dateTime('edm_date')->default('0000-00-00 00:00:00')->change();
			$table->dateTime('create_dt')->nullable();
			$table->dateTime('create_dt')->default('0000-00-00 00:00:00')->index('idx_create_dt')->comment('建立時間')->change();
			$table->string('create_user', 30)->default('')->comment('建立人員');
			$table->dateTime('modify_dt')->nullable();
			$table->dateTime('modify_dt')->default('0000-00-00 00:00:00')->index('idx_modify_dt')->comment('最後修改時間')->change();
			$table->string('modify_user', 30)->default('')->comment('異動人員');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('1: 正常, 0: 刪除');
			$table->boolean('banner_display_type')->default(0)->comment('1: 商品編號(暫無使用) 2:連結位置');
			$table->string('banner_img')->default('')->comment('banner圖片來源');
			$table->string('banner_link')->default('')->comment('banner連結');
			$table->integer('banner_pid')->default(0)->comment('商品編號(banner_display_type = 1 才會使用)');
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
		Schema::drop('buy123_edm_info');
	}

}
