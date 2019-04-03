<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCrossoverProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('crossover_products', function(Blueprint $table)
		{
			$table->foreign('coe_id', 'coe_id')->references('coe_id')->on('crossover_event')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('crossover_products', function(Blueprint $table)
		{
			$table->dropForeign('coe_id');
		});
	}

}
