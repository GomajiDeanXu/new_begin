<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketDispatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_dispatch', function(Blueprint $table)
		{
			$table->increments('ticket_dispatch_id');
			$table->integer('ticket_id')->unsigned()->default(0)->comment('ticket.ticket_id');
			$table->integer('dispatcher')->unsigned()->default(0)->comment('進行分派的人');
			$table->integer('from_support_id')->unsigned()->default(0)->comment('原來負責的客服人員 support.support_id');
			$table->integer('to_support_id')->unsigned()->default(0)->comment('分派到的客服人員 support.support_id');
			$table->text('comment', 65535)->nullable()->comment('分派原因');
			$table->integer('dispatch_ts')->unsigned()->default(0)->comment('分派時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_dispatch');
	}

}
