<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSequenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sequence', function(Blueprint $table)
		{
			$table->increments('sequence_id');
			$table->integer('batch')->default(0);
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->boolean('type')->default(1)->comment('類型;default:1;2:側邊欄');
			$table->boolean('flag')->default(1)->comment('1:有效');
			$table->integer('event_start_ts')->nullable()->default(0)->comment('輪播起始日');
			$table->integer('event_end_ts')->nullable()->default(0)->comment('輪播終止日');
			$table->integer('ch')->default(0);
			$table->boolean('city_id')->nullable()->default(1)->index('idx_city_id')->comment('城市');
			$table->boolean('sortof')->nullable()->default(0)->comment('指定順序');
			$table->string('title', 14)->nullable()->default('')->comment('標題');
			$table->string('assign_name', 20)->nullable()->default('')->comment('指定人員');
			$table->integer('create_ts')->nullable()->default(0)->comment('寫入日期');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sequence');
	}

}
