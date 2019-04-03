<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductNumberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('product_number', function(Blueprint $table)
		{
			$table->integer('nu_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('date_create')->default(0);
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle');
			$table->integer('sale_number')->default(0);
			$table->integer('used_number')->default(0);
			$table->integer('unverify_number')->default(0)->comment('反核銷數量');
			$table->integer('refund_number')->default(0);
			$table->integer('used_money')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('product_number');
	}

}
