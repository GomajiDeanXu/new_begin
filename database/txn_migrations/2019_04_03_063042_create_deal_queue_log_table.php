<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealQueueLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('deal_queue_log', function(Blueprint $table)
		{
			$table->increments('ref_id');
			$table->integer('qid')->unsigned()->default(0)->index('idx_qid')->comment('deal_queue.qid');
			$table->string('memo', 60)->nullable()->default('');
			$table->integer('create_ts')->unsigned()->default(0)->index('idx_create_ts');
			$table->string('nick', 16)->nullable()->default('');
			$table->boolean('type')->nullable()->default(0)->comment('事件分類；1: EDI 失敗記錄');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('deal_queue_log');
	}

}
