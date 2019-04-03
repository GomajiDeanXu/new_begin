<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductGeoTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_geo_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->default(0)->unique('idx_product_id')->comment('gomaji.products.product_id');
			$table->string('geo', 50)->nullable()->comment('所屬的region, products.city_id or ch=2 then spot.region (ref by products.spot_id)判 北部/中部/南部/花東/全國');
			$table->string('main_type', 50)->nullable()->comment('主類別 tag_id or category_id判');
			$table->timestamp('create_ts')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_geo_type');
	}

}
