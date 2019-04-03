<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrmToStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crm_to_store', function(Blueprint $table)
		{
			$table->integer('cts_id', true);
			$table->integer('rts_id');
			$table->integer('store_id')->index('mul2');
			$table->integer('crm_status')->default(0)->index('mul3');
			$table->integer('pass2')->default(0)->index('mul4');
			$table->text('command')->nullable();
			$table->integer('create_ts')->default(0);
			$table->integer('mail_ts')->default(0);
			$table->integer('verify_check_ts')->default(0);
			$table->integer('verify_mail_ts')->default(0)->comment('寄信時間');
			$table->index(['rts_id','store_id','crm_status','pass2'], 'mul');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crm_to_store');
	}

}
