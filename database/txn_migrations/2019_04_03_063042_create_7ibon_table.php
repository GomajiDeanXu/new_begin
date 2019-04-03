<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create7ibonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('7ibon', function(Blueprint $table)
		{
			$table->string('ibon_id', 16)->primary();
			$table->bigInteger('bill_no')->index('index_bill_no');
			$table->string('barcode_id', 32)->index('index_barcode_id');
			$table->string('termno_id', 32)->index('index_termno_id');
			$table->string('ibon_store_id', 12)->index('index_ibon_store_id');
			$table->integer('flag')->index('index_flag');
			$table->string('status', 32);
			$table->integer('date_create')->default(0);
			$table->integer('date_paid')->default(0);
			$table->integer('date_cancel')->default(0);
			$table->integer('date_writeoff')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('7ibon');
	}

}
