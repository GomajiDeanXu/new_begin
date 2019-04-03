<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbroadRevenueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('abroad_revenue', function(Blueprint $table)
		{
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('PID');
			$table->integer('sp_id')->default(0)->index('idx_sp_id')->comment('SPID');
			$table->integer('date_create')->default(0)->comment('建立時間');
			$table->integer('date_cycle')->default(0)->comment('計算週期');
			$table->integer('price')->default(0)->comment('單價');
			$table->integer('buy_number')->default(0)->comment('銷售數');
			$table->float('sale_money', 12, 4)->default(0.0000)->comment('店家拆分金額(只算第一階)');
			$table->float('gm_sale_money', 12, 4)->default(0.0000)->comment('GM拆分金額(只算第一階)');
			$table->integer('refund2_number')->default(0)->comment('當月買退退費份數');
			$table->float('refund2_money', 12, 4)->default(0.0000)->comment('當月買退退費店家拆分金額');
			$table->float('gm_refund2_money', 12, 4)->default(0.0000)->comment('當月買退退費GM拆分金額');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('abroad_revenue');
	}

}
