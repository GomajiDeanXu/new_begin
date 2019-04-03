<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('city', function(Blueprint $table)
		{
			$table->integer('city_id', true)->comment('城市ID');
			$table->string('city_name', 36)->default('')->comment('城市名稱(中文)');
			$table->string('city_en_name', 36)->nullable()->comment('城市名稱(英文)');
			$table->boolean('city_order')->default(0)->comment('城市排序(由大到小)');
			$table->boolean('city_type')->default(0)->comment('類型(1: 一般城市 / 2: 其他)');
			$table->boolean('flag')->default(1);
			$table->boolean('store_city_order')->default(0)->comment('店家城市排序（大到小）');
			$table->smallInteger('cs_id')->default(0)->index('idx_cs_id')->comment('city_zone.cs_id');
			$table->smallInteger('pad_city_id')->default(0)->comment('PAD配置城市ID(refer city.city_id)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('city');
	}

}
