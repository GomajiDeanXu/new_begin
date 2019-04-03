<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutsourcingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outsourcing', function(Blueprint $table)
		{
			$table->integer('os_id', true);
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->integer('appoint_id')->default(0)->comment('appoints.appoint_id');
			$table->integer('deadline')->default(0)->comment('繳件截止時間');
			$table->string('email')->default('')->comment('外包email');
			$table->text('notice', 65535)->comment('外包注意事項');
			$table->integer('sent_ts')->default(0)->comment('通知外包時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outsourcing');
	}

}
