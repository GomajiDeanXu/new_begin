<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExistMailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exist_mail', function(Blueprint $table)
		{
			$table->integer('mail_id', true)->comment('中獎mailID');
			$table->string('mail', 45)->index('mail')->comment('e-mail');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exist_mail');
	}

}
