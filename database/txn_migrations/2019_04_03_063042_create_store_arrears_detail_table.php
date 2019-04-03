<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreArrearsDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_arrears_detail', function(Blueprint $table)
		{
			$table->integer('sad_id', true);
			$table->integer('sa_id')->index('idx_sa_id')->comment('store_arrears.sa_id');
			$table->integer('store_id')->index('idx_store_id')->comment('store_info.store_id');
			$table->integer('group_id')->nullable()->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->integer('product_id')->nullable()->comment('商品編號');
			$table->string('charge_cycle', 20)->nullable()->comment('結算批次 i.e.20170401');
			$table->boolean('charge_type')->nullable()->comment('1:SH行銷贊助費');
			$table->integer('charge_fee')->nullable()->comment('收費金額');
			$table->string('memo', 100)->nullable()->comment('備註');
			$table->integer('create_ts')->nullable()->comment('建立時間');
			$table->integer('transfer_id')->nullable()->default(0)->comment('對應扣款的table的id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_arrears_detail');
	}

}
