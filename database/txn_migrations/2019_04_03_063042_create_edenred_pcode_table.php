<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEdenredPcodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('edenred_pcode', function(Blueprint $table)
		{
			$table->integer('ep_id', true)->comment('id');
			$table->string('edenred', 40)->default('')->index('idx_edenred')->comment('宜睿的序號');
			$table->string('prefix', 4)->default('')->index('idx_prefix')->comment('字首');
			$table->string('status', 10)->default('')->comment('狀態 chk / use / cancel');
			$table->string('response_code', 4)->default('')->comment('回傳結果');
			$table->string('message')->default('')->comment('回傳結果');
			$table->string('use_tran_code')->default('')->comment('使用當下的TranCode（取消時使用）');
			$table->integer('create_ts')->default(0)->comment('產生時間');
			$table->integer('modify_ts')->default(0)->comment('變更時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('edenred_pcode');
	}

}
