<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePqProductsControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pq_products_control', function(Blueprint $table)
		{
			$table->bigInteger('ppc_id', true)->unsigned();
			$table->smallInteger('dist_group_id')->unsigned()->nullable()->index('idx_dist_group_id')->comment('城市區塊編號(dist_group_list.dist_group_id)');
			$table->smallInteger('filter_id')->unsigned()->nullable()->index('idx_filter_id')->comment('分類類別編號');
			$table->integer('create_ts')->default(0)->comment('資料時間');
			$table->string('date_cycle', 11)->default('0')->index('idx_date_cycle')->comment('統計日');
			$table->smallInteger('control_number')->default(0)->comment('檔數');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('資料有無效？');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pq_products_control');
	}

}
