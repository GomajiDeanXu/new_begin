<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePqProductsControlValTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pq_products_control_val', function(Blueprint $table)
		{
			$table->smallInteger('ppcv_id', true)->unsigned();
			$table->smallInteger('dist_group_id')->unsigned()->nullable()->index('idx_dist_group_id')->comment('城市區塊編號(dist_group_list.dist_group_id)');
			$table->smallInteger('filter_id')->unsigned()->nullable()->index('idx_filter_id')->comment('分類類別編號(filter.filter_id)');
			$table->smallInteger('control_number')->unsigned()->nullable()->default(30)->comment('管控最大值');
			$table->integer('create_ts')->unsigned()->default(0)->comment('資料時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('資料有無效？');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pq_products_control_val');
	}

}
