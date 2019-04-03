<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_tag', function(Blueprint $table)
		{
			$table->integer('product_id')->index('idx_pid');
			$table->integer('tag_id')->index('idx_tid');
			$table->boolean('flag')->default(1);
			$table->unique(['product_id','tag_id'], 'idx_ptid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_tag');
	}

}
