<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreCheckStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_check_status', function(Blueprint $table)
		{
			$table->integer('scs_id', true);
			$table->integer('sci_id')->default(0)->index('idx_sci_id')->comment('gomaji.store_check_info.sci_id');
			$table->boolean('category')->default(0)->index('idx_category')->comment('參考 gomaji.flag_mapping');
			$table->boolean('status')->default(0)->index('idx_status')->comment('參考 gomaji.flag_mapping');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('參考 gomaji.flag_mapping');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_check_status');
	}

}
