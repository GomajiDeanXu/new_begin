<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnounceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announce', function(Blueprint $table)
		{
			$table->integer('announce_id', true)->comment('公告ID');
			$table->integer('product_id')->index('idx_product_id')->comment('商品ID');
			$table->string('title', 254)->default('')->comment('標題');
			$table->text('announcement', 65535)->comment('內容');
			$table->integer('date_create')->comment('建立時間');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('announce');
	}

}
