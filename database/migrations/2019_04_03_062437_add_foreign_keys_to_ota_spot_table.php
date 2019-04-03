<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOtaSpotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ota_spot', function(Blueprint $table)
		{
			$table->foreign('ota_spot_id', 'spot_id_foreign')->references('spot_id')->on('spot')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ota_spot', function(Blueprint $table)
		{
			$table->dropForeign('spot_id_foreign');
		});
	}

}
