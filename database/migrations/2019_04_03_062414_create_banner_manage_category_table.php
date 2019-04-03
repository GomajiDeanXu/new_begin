<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerManageCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_manage_category', function(Blueprint $table)
		{
			$table->integer('bmc_id', true);
			$table->boolean('ad_type')->default(0)->index('idx_ad_type')->comment('廣告類型');
			$table->string('ad_statement', 128)->default('')->comment('類型說明');
			$table->integer('img_limit')->nullable()->comment('圖片大小限制(k byte)');
			$table->integer('width_limit')->default(0)->comment('圖片寬(px)');
			$table->integer('height_limit')->default(0)->comment('圖片高(px)');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0:不可用
1:可用');
			$table->boolean('type')->default(0)->comment('(0: 團購 / 1: 行動支付)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner_manage_category');
	}

}
