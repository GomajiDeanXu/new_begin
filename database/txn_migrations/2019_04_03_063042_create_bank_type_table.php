<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('bank_type', function(Blueprint $table)
		{
			$table->integer('bt_id', true);
			$table->string('type_name', 64)->default('');
			$table->boolean('flag')->default(0)->index('idx_flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('bank_type');
	}

}
