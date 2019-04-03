<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('purchase_email', function(Blueprint $table)
		{
			$table->bigInteger('gm_uid')->primary();
			$table->string('email', 45)->index('email');
			$table->boolean('flag')->default(0)->index('flag');
			$table->integer('create_ts')->default(0)->index('create_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('purchase_email');
	}

}
