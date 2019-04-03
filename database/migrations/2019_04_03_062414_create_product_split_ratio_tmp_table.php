<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSplitRatioTmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_split_ratio_tmp', function(Blueprint $table)
		{
			$table->integer('ratio_id', true);
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->integer('qc_preview_id')->default(0)->index('idx_qc_preview_id')->comment('qc_preview.qc_preview_id');
			$table->integer('spt_id')->default(0)->index('idx_spt_id');
			$table->integer('favorable_prize')->default(0)->comment('優惠價');
			$table->boolean('channel')->default(0)->index('idx_channel');
			$table->integer('start_num')->default(0);
			$table->integer('end_num')->default(0);
			$table->float('ratio', 11, 4)->default(0.0000);
			$table->integer('create_time')->default(0);
			$table->integer('confirm_time')->default(0);
			$table->boolean('sale_type')->default(0)->comment('0:自銷
1:代銷');
			$table->boolean('split_type')->default(0)->index('idx_split_type');
			$table->boolean('flag')->default(0)->index('idx_verify');
			$table->char('encode_key', 32)->default('')->index('idx_encode_key');
			$table->integer('modify_time')->default(0);
			$table->boolean('modify_type')->default(0)->index('idx_modify_type');
			$table->integer('sales_id')->default(0);
			$table->integer('pre_schedule_id');
			$table->integer('case_number')->comment('方案順序');
			$table->integer('type_number')->comment('方案數');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_split_ratio_tmp');
	}

}
