<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGmProductSortTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gm_product_sort', function(Blueprint $table)
		{
			$table->char('uuid', 32)->default('')->index('idx_uuid')->comment('使用者的uuid');
			$table->integer('sort_id')->index('idx_sort_id')->comment('對應到gm_product_list');
			$table->integer('create_ts')->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gm_product_sort');
	}

}
