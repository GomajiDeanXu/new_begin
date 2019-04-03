<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrossoverMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crossover_mapping', function(Blueprint $table)
		{
			$table->integer('com_id', true);
			$table->integer('mapping_type')->default(0)->comment('1:商品對應 2:店家對應');
			$table->integer('product_id')->default(0);
			$table->integer('sp_id')->default(0);
			$table->string('co_product_id', 20)->default('0');
			$table->string('event_id', 60)->default('0')->comment('crossover_event.event_id');
			$table->integer('store_id')->default(0);
			$table->integer('group_id')->default(0);
			$table->string('merchant_id', 20)->default('')->comment('品牌通路代碼');
			$table->integer('flag')->default(1)->comment('1:有效 0:無效');
			$table->integer('create_ts')->comment('建立時間');
			$table->string('create_user', 30)->comment('建立人員');
			$table->integer('modify_ts')->comment('修改時間');
			$table->string('modify_user', 30)->comment('修改人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crossover_mapping');
	}

}
