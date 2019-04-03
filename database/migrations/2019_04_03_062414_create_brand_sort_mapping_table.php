<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandSortMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brand_sort_mapping', function(Blueprint $table)
		{
			$table->integer('bsm_id', true);
			$table->integer('pa_id')->nullable()->default(0)->index('idx_pa_id')->comment('mapping gomaji.products_attribute.pa_id');
			$table->boolean('mapping_type')->nullable()->default(0)->index('idx_mapping_type')->comment('請參flag_mapping，1:RS品牌牆，2:SH的人氣美食，3:SH的生鮮調理');
			$table->integer('sort_value')->nullable()->default(0)->comment('排序');
			$table->dateTime('modify_ts')->nullable()->default('1970-01-01 00:00:00')->comment('修改時間');
			$table->string('modify_user', 30)->nullable()->default('')->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brand_sort_mapping');
	}

}
