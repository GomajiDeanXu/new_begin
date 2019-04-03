<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreContactStatusMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_contact_status_map', function(Blueprint $table)
		{
			$table->boolean('contact_status_id')->primary();
			$table->string('contact_status', 45)->default('')->comment('開發狀態');
			$table->integer('contact_order')->comment('後台顯示排序用');
			$table->boolean('flag')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_contact_status_map');
	}

}
