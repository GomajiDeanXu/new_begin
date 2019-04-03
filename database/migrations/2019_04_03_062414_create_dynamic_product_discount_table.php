<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDynamicProductDiscountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dynamic_product_discount', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->default(0)->index('product_id');
			$table->dateTime('validated_from')->default('0000-00-00 00:00:00')->comment('有效起始時間');
			$table->dateTime('validated_to')->default('0000-00-00 00:00:00')->comment('有效到期時間');
			$table->float('discount', 5)->default(0.00)->comment('麻吉券 折抵折數');
			$table->string('pcode', 15)->nullable()->comment('pcode_main.prefix + pin_code 字首-六碼英數字');
			$table->dateTime('create_ts')->nullable()->default('1970-01-01 00:00:00')->comment('建立時間');
			$table->unique(['product_id','validated_from'], 'index_pid_from');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dynamic_product_discount');
	}

}
