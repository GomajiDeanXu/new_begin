<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRivalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rivals', function(Blueprint $table)
		{
			$table->integer('rival_id', true)->comment('團購業者ID');
			$table->string('rival_name', 32)->nullable()->comment('團購業者名稱');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rivals');
	}

}
