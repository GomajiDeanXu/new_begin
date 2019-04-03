<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientIpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_ip', function(Blueprint $table)
		{
			$table->integer('client_id')->default(0)->comment('gomaji.client.client_id');
			$table->boolean('type')->nullable()->comment('控管類別');
			$table->integer('create_ts')->nullable()->comment('建立時間');
			$table->integer('cancel_ts')->nullable()->comment('取消時間');
			$table->string('ip', 15)->nullable()->comment('IP 位址');
			$table->integer('flag')->nullable()->comment('bitwise');
			$table->index(['client_id','type'], 'idx_client_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client_ip');
	}

}
