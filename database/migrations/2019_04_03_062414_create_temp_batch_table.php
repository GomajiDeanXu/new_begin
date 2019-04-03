<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTempBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_batch', function(Blueprint $table)
		{
			$table->integer('group_id')->nullable()->index('idx_group_id');
			$table->string('invoice_title', 45)->nullable();
			$table->string('invoice_id', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('temp_batch');
	}

}
