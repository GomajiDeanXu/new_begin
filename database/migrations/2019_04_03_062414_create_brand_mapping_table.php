<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brand_mapping', function(Blueprint $table)
		{
			$table->integer('bm_id', true);
			$table->integer('pa_id')->nullable()->default(0)->index('idx_pa_id')->comment('mapping gomaji.products_attribute.pa_id');
			$table->integer('store_id')->nullable()->default(0)->comment('店家ID');
			$table->boolean('mapping_type')->nullable()->default(0)->index('idx_mapping_type')->comment('1:RS品牌牆');
			$table->dateTime('create_ts')->nullable()->default('1970-01-01 00:00:00')->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brand_mapping');
	}

}
