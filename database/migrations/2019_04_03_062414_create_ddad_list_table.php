<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDdadListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ddad_list', function(Blueprint $table)
		{
			$table->integer('ddad_id');
			$table->integer('product_id');
			$table->integer('sort');
			$table->integer('ch')->index('index_ch');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ddad_list');
	}

}
