<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appoints', function(Blueprint $table)
		{
			$table->integer('appoint_id', true);
			$table->integer('backend_id')->default(0)->comment('backend id');
			$table->smallInteger('appoint_no')->default(0)->comment('外包編號');
			$table->integer('city_id')->default(0)->comment('城市');
			$table->string('ch_name', 12)->default('')->comment('中文名');
			$table->string('en_name', 45)->index('idx_en_name');
			$table->string('phone', 16);
			$table->string('email', 45)->index('idx_email');
			$table->boolean('sex')->default(0)->comment('1:男；2:女');
			$table->boolean('flag')->default(1)->comment('1:特派;2:外包');
			$table->integer('state')->default(1)->comment('1:normal;0:離職／不合作');
			$table->smallInteger('ext')->default(0)->comment('分機');
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
		Schema::drop('appoints');
	}

}
