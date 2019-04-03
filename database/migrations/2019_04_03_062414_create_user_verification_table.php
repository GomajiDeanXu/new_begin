<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserVerificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_verification', function(Blueprint $table)
		{
			$table->increments('verification_id');
			$table->integer('gm_uid')->unsigned()->index('gm_uid')->comment('會員 ID');
			$table->string('verification_code', 4)->nullable()->comment('驗證碼');
			$table->integer('create_ts')->unsigned()->default(0)->comment('驗證碼發送時間');
			$table->integer('verified_ts')->unsigned()->default(0)->comment('驗證時間');
			$table->boolean('flag')->default(0)->comment('0: 已發送
1: 已驗證
2: 作廢(已重新發送別組驗證碼)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_verification');
	}

}
