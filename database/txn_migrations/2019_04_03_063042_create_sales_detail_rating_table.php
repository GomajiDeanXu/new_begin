<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesDetailRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_detail_rating', function(Blueprint $table)
		{
			$table->integer('sdr_id', true)->comment('顧問點評統計表ID');
			$table->integer('sales_id')->default(0)->index('idx_sales_id')->comment('顧問ID');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('PID');
			$table->integer('date_cycle')->index('idx_date_cycle')->comment('區間');
			$table->integer('rating')->default(0)->comment('當日單一商品點評分數');
			$table->integer('cnt')->default(0)->comment('當日單一商品點評筆數');
			$table->float('addup_avg', 4)->default(0.00)->comment('累積當月單一商品點評平均分數');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_detail_rating');
	}

}
