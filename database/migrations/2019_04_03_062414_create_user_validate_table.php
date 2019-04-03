<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserValidateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_validate', function(Blueprint $table)
		{
			$table->bigInteger('vid', true)->unsigned();
			$table->bigInteger('gm_uid')->unsigned()->unique('uni_gm_uid');
			$table->string('email', 45);
			$table->char('code', 32)->index('idx_code');
			$table->integer('ts')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_validate');
	}

}
