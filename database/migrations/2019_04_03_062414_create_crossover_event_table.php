<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrossoverEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crossover_event', function(Blueprint $table)
		{
			$table->integer('coe_id', true);
			$table->string('event_id', 60)->default('0')->comment('活動代碼');
			$table->string('event_name', 100)->default('0')->comment('活動名稱');
			$table->integer('flag')->default(1)->comment('1:有效 0:無效');
			$table->string('memo', 200)->default('')->comment('備註');
			$table->integer('create_ts')->comment('建立時間');
			$table->string('creat_user', 30)->comment('建立人員');
			$table->integer('modify_ts')->comment('異動時間');
			$table->string('modify_user', 30)->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crossover_event');
	}

}
