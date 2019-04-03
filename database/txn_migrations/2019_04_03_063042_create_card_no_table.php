<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardNoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('card_no', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->binary('card_no', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('card_no');
	}

}
