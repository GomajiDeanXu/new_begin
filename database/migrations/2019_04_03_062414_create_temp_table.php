<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp', function(Blueprint $table)
		{
			$table->string('col01', 100)->nullable();
			$table->string('col02', 100)->nullable();
			$table->string('col03', 100)->nullable();
			$table->string('col04', 100)->nullable();
			$table->string('col05', 100)->nullable();
			$table->string('col06', 100)->nullable();
			$table->string('col07', 100)->nullable();
			$table->string('col08', 100)->nullable();
			$table->string('col09', 100)->nullable();
			$table->string('col10', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('temp');
	}

}
