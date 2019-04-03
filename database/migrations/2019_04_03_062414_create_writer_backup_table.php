<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWriterBackupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('writer_backup', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->default(0);
			$table->string('writer', 20)->default('');
			$table->text('sub_product_name', 65535);
			$table->text('store_intro', 65535);
			$table->text('highlights', 65535);
			$table->integer('ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('writer_backup');
	}

}
