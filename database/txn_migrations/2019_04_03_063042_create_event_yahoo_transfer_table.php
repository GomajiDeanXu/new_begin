<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventYahooTransferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('event_yahoo_transfer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('full_name', 45)->nullable();
			$table->string('mobile_phone', 10);
			$table->string('email', 45);
			$table->boolean('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('event_yahoo_transfer');
	}

}
