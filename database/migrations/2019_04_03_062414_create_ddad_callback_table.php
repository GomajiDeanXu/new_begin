<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDdadCallbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ddad_callback', function(Blueprint $table)
		{
			$table->integer('ddad_id', true);
			$table->integer('tag_id')->index('index_tag_id');
			$table->string('uuid', 128);
			$table->integer('ch')->index('index_ch');
			$table->boolean('ot')->default(0)->index('idx_type');
			$table->integer('create_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ddad_callback');
	}

}
