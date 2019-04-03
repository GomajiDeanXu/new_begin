<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWordingTemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wording_template', function(Blueprint $table)
		{
			$table->increments('wording_id')->comment('系統流水號');
			$table->boolean('wording_type')->default(1)->comment('1=贈點活動使用');
			$table->string('statement1', 100)->default('')->comment('字樣一');
			$table->string('statement2', 100)->default('')->comment('字樣二');
			$table->string('statement3', 100)->default('')->comment('字樣三');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wording_template');
	}

}
