<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnounceEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announce_email', function(Blueprint $table)
		{
			$table->integer('aid', true);
			$table->string('type', 8)->default('')->index('idx_type');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->string('branch_ids')->default('')->index('idx_branch_ids');
			$table->boolean('send_type')->default(0)->index('idx_send_type');
			$table->string('subject')->default('');
			$table->text('cont', 65535);
			$table->string('file', 32)->default('');
			$table->integer('create_ts')->default(0);
			$table->integer('booking_ts')->default(0)->index('idx_booking_ts');
			$table->integer('send_ts')->default(0);
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->boolean('order_type')->default(0)->comment('訂單類型 [對應值查 flag_mapping]');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('announce_email');
	}

}
