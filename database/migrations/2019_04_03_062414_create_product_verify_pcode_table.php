<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductVerifyPcodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_verify_pcode', function(Blueprint $table)
		{
			$table->integer('pcode_id', true);
			$table->integer('product_id')->index('idx_product_id')->comment('product_id');
			$table->integer('money')->default(0)->comment('麻吉券金額');
			$table->integer('expiry_days')->default(0)->comment('使用天數');
			$table->integer('create_ts');
			$table->boolean('flag')->default(0)->comment('0: 刪除 / 1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_verify_pcode');
	}

}
