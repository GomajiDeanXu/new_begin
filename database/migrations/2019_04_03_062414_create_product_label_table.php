<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductLabelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_label', function(Blueprint $table)
		{
			$table->increments('lab_id')->comment('系統流水號');
			$table->boolean('define_type')->default(1)->comment('1=商品類型(byPID),2=店家類型(byGID)');
			$table->integer('group_id')->default(0)->index('idx_gid')->comment('GID');
			$table->integer('product_id')->default(0)->index('idx_pid')->comment('PID');
			$table->boolean('newflag')->default(0)->comment('0=無定義,1=NewNew,2=OldNew');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_label');
	}

}
