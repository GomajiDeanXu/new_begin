<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpFamilyNoGenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sp_family_no_gen', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID，(對應gomaji.store_info.store_id)');
			$table->integer('create_ts')->default(0)->comment('建立時間timestamp');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sp_family_no_gen');
	}

}
