<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityZoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('city_zone', function(Blueprint $table)
		{
			$table->smallInteger('cs_id', true)->unsigned();
			$table->boolean('flag')->default(1)->comment('1:有效');
			$table->boolean('sortof')->nullable()->default(0)->comment('指定順序');
			$table->string('refer_name', 14)->nullable()->default('');
			$table->string('show_name', 20)->nullable()->default('')->comment('顯示名稱');
			$table->integer('create_ts')->nullable()->default(0)->comment('寫入日期');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('city_zone');
	}

}
