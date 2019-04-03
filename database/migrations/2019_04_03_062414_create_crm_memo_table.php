<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrmMemoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crm_memo', function(Blueprint $table)
		{
			$table->integer('cm_id', true);
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->string('crm_nick', 64)->default('')->comment('edit account');
			$table->integer('crm_id')->default(0)->comment('edit account id');
			$table->text('memo', 65535);
			$table->integer('create_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crm_memo');
	}

}
