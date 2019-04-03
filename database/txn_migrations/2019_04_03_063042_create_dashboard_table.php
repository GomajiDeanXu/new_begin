<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDashboardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('dashboard', function(Blueprint $table)
		{
			$table->integer('board_id', true);
			$table->boolean('channel')->default(0)->comment('1:LB / 2:ES / 4:SH / 5:BR');
			$table->integer('rank')->default(0)->index('idx_rank')->comment('排名');
			$table->integer('sales_id')->default(0)->index('idx_sales_id')->comment('sales_id');
			$table->string('ch_name', 20)->default('')->comment('行銷顧問姓名');
			$table->string('leader', 20)->default('')->comment('直屬主管');
			$table->integer('money')->default(0)->index('idx_money')->comment('營收');
			$table->integer('gm_money')->default(0)->index('idx_gm_money')->comment('GOMAJI 預估營收');
			$table->integer('schedule_new')->default(0)->comment('取號新檔數');
			$table->integer('schedule_republish')->default(0)->comment('取號分次數');
			$table->float('new_product_rate', 3)->default(0.00)->comment('新品率');
			$table->integer('board_ts')->default(0)->index('idx_cycle');
			$table->integer('create_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('dashboard');
	}

}
