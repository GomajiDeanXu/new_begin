<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreReferResourceMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_refer_resource_map', function(Blueprint $table)
		{
			$table->boolean('refer_resource_id')->primary();
			$table->string('resource', 45);
			$table->boolean('resource_code')->nullable()->default(0)->unique('resource_code_UNIQUE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_refer_resource_map');
	}

}
