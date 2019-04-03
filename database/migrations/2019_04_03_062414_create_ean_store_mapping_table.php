<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEanStoreMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ean_store_mapping', function(Blueprint $table)
		{
			$table->integer('esm_id', true);
			$table->integer('ean_group_id')->nullable()->default(0)->index('idx_ean_group_id')->comment('mapping gomaji.store_branch_total.branch_id 或 (gomaji.outbound_hotel.group_id & gomaji.outbound_hotel.site_id = 2)');
			$table->integer('gomaji_group_id')->nullable()->default(0)->index('idx_gomaji_group_id')->comment('mapping gomaji.store_branch_total.branch_id');
			$table->integer('store_id')->nullable()->default(0)->index('idx_store_id')->comment('店家ID');
			$table->dateTime('create_ts')->nullable()->default('1970-01-01 00:00:00')->index('idx_create_ts')->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ean_store_mapping');
	}

}
