<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreAliasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_alias', function(Blueprint $table)
		{
			$table->increments('store_alias_id')->comment('店家別名ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->string('store_name', 45)->default('')->index('idx_store_name')->comment('別名');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_alias');
	}

}
