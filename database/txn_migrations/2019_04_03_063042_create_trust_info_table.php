<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('store_sernum', 3);
			$table->char('bank_sernum', 6)->nullable();
			$table->string('url_data_transfer')->nullable();
			$table->string('status', 8)->nullable()->index('idx_status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_info');
	}

}
