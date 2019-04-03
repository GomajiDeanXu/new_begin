<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGotopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gotop', function(Blueprint $table)
		{
			$table->integer('top_id', true);
			$table->integer('ad_position')->default(0)->index('idx_ad_position')->comment('版面位置(bitwise)');
			$table->integer('plat')->default(0)->comment('裝置(bitwise)');
			$table->string('city_id', 128)->default('')->comment('分區, city_id 以逗號隔開(0:全部城市)');
			$table->integer('product_id')->default(0)->comment('products.product_id');
			$table->string('subject', 128)->comment('標題');
			$table->integer('start_ts')->default(0)->comment('開始時間');
			$table->integer('end_ts')->default(0)->comment('結束時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態
1:可使用
0:不可使用');
			$table->integer('create_ts')->default(0)->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gotop');
	}

}
