<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_fee', function(Blueprint $table)
		{
			$table->integer('pf_id', true);
			$table->integer('ch')->nullable()->index('idx_ch');
			$table->integer('store_id')->nullable()->index('idx_store_id');
			$table->integer('group_id')->nullable()->default(0)->index('idx_group_id');
			$table->integer('present_id')->nullable()->default(0)->comment('提品商品流水號');
			$table->integer('pre_schedule_id')->nullable();
			$table->integer('product_id')->nullable();
			$table->boolean('charge_type')->comment('1:SH行銷贊助費');
			$table->integer('charge_fee')->comment('收費金額');
			$table->boolean('charge_flag')->comment('1:收取 0:不收取');
			$table->string('reason', 50)->nullable()->default('')->comment('原因');
			$table->string('memo', 100)->nullable()->default('')->comment('備註');
			$table->integer('create_ts')->comment('建立時間');
			$table->string('create_user', 30)->comment('建立人員');
			$table->integer('modify_ts')->comment('異動時間');
			$table->string('modify_user', 30)->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_fee');
	}

}
