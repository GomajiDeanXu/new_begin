<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustDataAnalyseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_data_analyse', function(Blueprint $table)
		{
			$table->integer('data_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('date_create')->default(0);
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle');
			$table->boolean('sale_type')->default(0)->index('sale_type');
			$table->integer('sale_number')->default(0);
			$table->float('sale_money', 12, 4)->default(0.0000);
			$table->float('gm_sale_money', 12, 4)->default(0.0000);
			$table->integer('used_number')->default(0);
			$table->float('used_money', 12, 4)->default(0.0000);
			$table->float('gm_used_money', 12, 4)->default(0.0000);
			$table->integer('refund_number')->default(0)->comment('當日退費數');
			$table->float('refund_money', 12, 4)->default(0.0000);
			$table->float('gm_refund_money', 12, 4)->default(0.0000);
			$table->integer('refund2_number')->default(0)->comment('當月退費數');
			$table->float('refund2_money', 12, 4)->default(0.0000);
			$table->float('gm_refund2_money', 12, 4)->default(0.0000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_data_analyse');
	}

}
