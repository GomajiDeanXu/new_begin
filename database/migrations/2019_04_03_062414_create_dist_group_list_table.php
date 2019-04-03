<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistGroupListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dist_group_list', function(Blueprint $table)
		{
			$table->increments('dist_group_id');
			$table->string('dist_group_name', 45)->nullable()->comment('行政區塊名稱');
			$table->boolean('city_id')->default(0)->comment('所屬城市(city.city_id)');
			$table->boolean('type')->default(0)->comment('用途');
			$table->boolean('flag')->default(1)->comment('資料有效與否？');
			$table->boolean('region')->default(0)->comment('區域');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dist_group_list');
	}

}
