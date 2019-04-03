<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSplitRatioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_split_ratio', function(Blueprint $table)
		{
			$table->integer('split_ratio_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('favorable_prize')->default(0)->comment('優惠價');
			$table->integer('start_num')->default(0);
			$table->integer('end_num')->default(0);
			$table->float('ratio', 11, 4)->default(0.0000);
			$table->integer('create_time')->default(0);
			$table->integer('confirm_time')->default(0)->comment('審核時間(異動後隔日會重算檔次的每日結算)');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('0:未審核
1:已審核');
			$table->integer('rts_id')->default(0);
			$table->integer('spt_id')->default(0)->index('idx_spt_id');
			$table->boolean('channel')->default(0)->index('idx_channel');
			$table->boolean('sale_type')->default(0)->index('idx_sale_type');
			$table->boolean('split_type')->default(0)->index('idx_split_type');
			$table->integer('ratio_id')->default(0)->index('idx_ratio_id');
			$table->integer('modify_time')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_split_ratio');
	}

}
