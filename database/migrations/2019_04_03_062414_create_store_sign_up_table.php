<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreSignUpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_sign_up', function(Blueprint $table)
		{
			$table->integer('sign_up_id', true);
			$table->boolean('ticket_category_id')->default(0)->comment('頻道 ticket_category.ticket_category_id');
			$table->integer('city_id')->default(0)->comment('所在地 city.city_id');
			$table->string('other_city', 32)->nullable()->comment('所在地選其他');
			$table->string('store_name', 45)->nullable()->comment('店家名稱');
			$table->string('store_website')->nullable()->comment('店家官網/部落格');
			$table->string('product_content')->nullable()->comment('活動/商品內容');
			$table->boolean('physical_store')->default(0)->comment('實體店面(0: 無 / 1: 有)');
			$table->boolean('store_type')->default(0)->comment('公司類型(0: 單店 / 1: 連鎖)');
			$table->string('contact_name', 45)->nullable()->comment('聯絡人');
			$table->string('phone', 20)->nullable()->comment('聯絡電話');
			$table->string('email', 200)->nullable()->comment('聯絡email');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('報名時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_sign_up');
	}

}
