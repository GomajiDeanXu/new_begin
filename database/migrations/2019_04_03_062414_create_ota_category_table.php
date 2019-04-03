<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ota_category', function(Blueprint $table)
		{
			$table->increments('id')->comment('id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('gid');
			$table->integer('ota_category_id')->default(0)->index('idx_ota_category_id')->comment('categore_id');
			$table->string('ota_category_name', 45)->nullable()->comment('類別名');
			$table->integer('flag')->nullable()->default(1)->comment('0: 未使用 / 1: 使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ota_category');
	}

}
