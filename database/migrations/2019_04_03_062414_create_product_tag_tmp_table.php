<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTagTmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_tag_tmp', function(Blueprint $table)
		{
			$table->integer('rts_id')->default(0);
			$table->integer('pre_schedule_id')->default(0);
			$table->integer('tag_id')->default(0);
			$table->index(['rts_id','pre_schedule_id','tag_id'], 'idx_pttid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_tag_tmp');
	}

}
