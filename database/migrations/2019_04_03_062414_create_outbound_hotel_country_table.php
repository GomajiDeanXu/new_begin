<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboundHotelCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outbound_hotel_country', function(Blueprint $table)
		{
			$table->integer('country_id')->primary()->comment('國家編號(EAN)');
			$table->string('en_name', 128)->nullable()->comment('英文名字');
			$table->string('name', 128)->nullable()->comment('中文名字');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outbound_hotel_country');
	}

}
