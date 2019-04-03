<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstimateRevenueMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estimate_revenue_map', function(Blueprint $table)
		{
			$table->integer('er_id', true);
			$table->boolean('channel')->default(0)->index('idx_channel')->comment('gomaji
channel_map.channel');
			$table->integer('estimate_revenue_start')->default(0);
			$table->integer('estimate_revenue_end')->default(0);
			$table->boolean('level')->nullable()->default(0)->comment('級距');
			$table->string('level_desc', 45)->default('')->comment('級距說明');
			$table->boolean('flag')->default(1)->comment('0: 刪除
1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estimate_revenue_map');
	}

}
