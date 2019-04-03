<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRejectCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reject_category', function(Blueprint $table)
		{
			$table->integer('rc_id', true);
			$table->string('category_name', 45)->comment('退件類別名稱');
			$table->integer('create_ts')->default(0);
			$table->boolean('flag')->default(1)->comment('0: 刪除\n1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reject_category');
	}

}
