<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoritesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favorites', function(Blueprint $table)
		{
			$table->increments('favorite_id');
			$table->integer('gm_uid')->unsigned()->default(0)->index('fk_user_favorite')->comment('會員 ID');
			$table->integer('group_id')->unsigned()->default(0)->index('fk_favorite_group')->comment('分店 group_id');
			$table->integer('product_id')->unsigned()->default(0)->index('fk_favorite_product')->comment('商品 product id');
			$table->integer('mbranch_id')->unsigned()->default(0)->index('fk_favorite_mbranch')->comment('店家產品 mbranch id');
			$table->integer('hotel_id')->unsigned()->default(0)->index('fk_favorite_hotel')->comment('OTA旅館id');
			$table->integer('create_ts')->unsigned()->default(0)->comment('收藏時間');
			$table->unique(['gm_uid','group_id','product_id','mbranch_id','hotel_id'], 'unique_all');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('favorites');
	}

}
