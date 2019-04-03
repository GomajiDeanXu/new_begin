<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImgUploadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('img_upload', function(Blueprint $table)
		{
			$table->integer('img_id', true)->comment('圖片ID');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->string('lower_price_url', 400)->default('')->comment('EAN買貴比對URL');
			$table->float('lower_price_amount', 10, 0)->nullable()->default(0)->comment('EAN比價較低售價');
			$table->boolean('flag')->default(1)->comment('(0: 刪除 / 1: 正常)');
			$table->string('upload_img1', 128)->default('')->comment('上傳圖片1');
			$table->string('upload_img2', 128)->nullable()->comment('上傳圖片2');
			$table->string('upload_img3', 128)->nullable()->comment('上傳圖片3');
			$table->dateTime('create_dt')->index('idx_create_dt')->comment('建檔時間');
			$table->dateTime('modify_dt')->nullable()->default('0000-00-00 00:00:00')->comment('異動時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('img_upload');
	}

}
