<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealQueueRmidTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('deal_queue_rmid', function(Blueprint $table)
		{
			$table->integer('rauto', true);
			$table->integer('qid')->default(0)->index('idx_qid');
			$table->integer('rv_qid')->default(0);
			$table->integer('rv_rmid')->default(0);
			$table->bigInteger('bill_no')->default(0);
			$table->integer('date_create')->default(0);
			$table->boolean('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('deal_queue_rmid');
	}

}
