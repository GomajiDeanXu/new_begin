<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodlifeStoreAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goodlife_store_address', function(Blueprint $table)
		{
			$table->integer('goodlife_id')->index('idx_goodlife_id');
			$table->string('address', 64);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goodlife_store_address');
	}

}
