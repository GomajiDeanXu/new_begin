<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support', function(Blueprint $table)
		{
			$table->integer('support_id')->primary();
			$table->string('ch_name', 12)->index('ch_name');
			$table->string('en_name', 45)->index('en_name');
			$table->string('phone', 16)->index('phone');
			$table->string('email', 45)->index('email');
			$table->boolean('sex')->index('sex');
			$table->char('dep_ids', 30)->index('dep_ids');
			$table->integer('manager_id')->default(0)->index('manager_id');
			$table->boolean('is_leader')->default(0)->index('is_leader');
			$table->char('group_id', 30)->index('group_id');
			$table->boolean('flag')->default(1)->index('flag');
			$table->integer('type')->default(1)->index('type');
			$table->smallInteger('ext')->default(0);
			$table->string('en_name_alias', 45)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('support');
	}

}
