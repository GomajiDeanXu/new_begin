<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVerifyDataAnalyseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('verify_data_analyse', function(Blueprint $table)
		{
			$table->integer('verify_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('date_create')->default(0);
			$table->date('date_cycle')->index('idx_date_cycle');
			$table->boolean('sale_type')->default(0)->comment('銷售方式');
			$table->integer('sale_number')->default(0)->comment('銷售數量');
			$table->float('sale_money', 12, 4)->default(0.0000)->comment('店家銷售拆分金額');
			$table->float('gm_sale_money', 12, 4)->default(0.0000)->comment('GM銷售拆分金額');
			$table->integer('verify_number')->default(0)->comment('當日核銷數量');
			$table->integer('unverify_number')->default(0)->comment('當日反核銷數量');
			$table->integer('daily_net')->default(0)->comment('當日淨核銷量');
			$table->integer('addup_net')->default(0)->comment('該商品累積淨核銷量');
			$table->float('verify_money', 12, 4)->default(0.0000)->comment('店家核銷拆分金額');
			$table->float('gm_verify_money', 12, 4)->default(0.0000)->comment('GM核銷拆分金額');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('verify_data_analyse');
	}

}
