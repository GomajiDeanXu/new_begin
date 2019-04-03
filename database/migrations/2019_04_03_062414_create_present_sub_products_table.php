<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentSubProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_sub_products', function(Blueprint $table)
		{
			$table->increments('sp_id');
			$table->integer('present_id')->unsigned()->default(0)->index('idx_present_id')->comment('present_products.present_id');
			$table->string('sp_name', 254)->comment('方案名稱');
			$table->integer('sp_price')->unsigned()->default(0)->comment('售價');
			$table->integer('sp_org_price')->unsigned()->default(0)->comment('原價');
			$table->integer('sp_costs')->unsigned()->default(0)->comment('GOMAJI進貨價');
			$table->integer('sp_create_ts')->unsigned()->default(0)->comment('建立時間');
			$table->boolean('flag')->default(0)->comment('1.有效:0.無效');
			$table->integer('store_pickup_max')->nullable()->default(0)->comment('超取交易可購上限數');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_sub_products');
	}

}
