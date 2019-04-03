<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_tag', function(Blueprint $table)
		{
			$table->integer('store_id')->index('idx_sid');
			$table->integer('tag_id')->index('idx_tid');
			$table->boolean('flag')->default(1);
			$table->unique(['store_id','tag_id'], 'idx_stid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_tag');
	}

}
