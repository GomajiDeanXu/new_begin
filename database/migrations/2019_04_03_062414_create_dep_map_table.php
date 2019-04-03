<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dep_map', function(Blueprint $table)
		{
			$table->integer('dep_id', true);
			$table->string('dep', 10)->index('dep');
			$table->string('ch_name', 20)->index('ch_name');
			$table->boolean('flag')->default(1)->index('flag');
			$table->string('bu', 8)->index('bu');
			$table->string('bu_name', 20)->nullable();
			$table->integer('channel')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dep_map');
	}

}
