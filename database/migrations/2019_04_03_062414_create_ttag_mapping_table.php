<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTtagMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ttag_mapping', function(Blueprint $table)
		{
			$table->integer('ttag_id', true);
			$table->string('ttag_name', 32);
			$table->string('invoice_name', 20)->default('');
			$table->boolean('travel')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ttag_mapping');
	}

}
