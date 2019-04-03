<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMcdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('mcd', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email', 45)->nullable()->index('idx_email');
			$table->string('mobile_phone', 10)->nullable()->index('idx_mobile_phone');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('mcd');
	}

}
