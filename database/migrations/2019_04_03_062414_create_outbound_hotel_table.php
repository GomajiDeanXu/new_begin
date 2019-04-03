<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboundHotelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outbound_hotel', function(Blueprint $table)
		{
			$table->integer('hotel_id')->default(0)->comment('對應系統傳入KEY值');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->boolean('site_id')->default(1)->comment('1-outbound / 2-EAN ');
			$table->string('c_name', 128)->comment('飯店中文名');
			$table->string('e_name', 128)->comment('飯店英文名');
			$table->string('postcode', 16)->default('')->comment('飯店郵遞區號');
			$table->string('region', 16)->default('')->comment('飯店地區');
			$table->string('prefectures', 16)->default('')->comment('飯店都道府縣');
			$table->string('description', 200)->default('')->comment('飯店簡介');
			$table->dateTime('create_ts')->comment('建立日期時間');
			$table->dateTime('modify_ts')->comment('修改日期時間');
			$table->string('address', 256)->default('')->comment('飯店地址');
			$table->string('website_link', 128)->default('')->comment('飯店官網');
			$table->string('mail', 45)->default('')->comment('飯店E-Mail');
			$table->string('tel', 45)->default('')->comment('飯店電話');
			$table->string('lat', 11)->default('')->comment('緯度');
			$table->string('lng', 11)->default('')->comment('經度');
			$table->string('img', 128)->default('')->comment('飯店圖片');
			$table->string('img_thumbnail', 128)->default('')->comment('飯店縮圖');
			$table->integer('country_id')->nullable()->comment('國家編號(EAN)');
			$table->primary(['hotel_id','site_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outbound_hotel');
	}

}
