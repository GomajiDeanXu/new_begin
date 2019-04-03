<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcodePrefixTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('pcode_prefix', function(Blueprint $table)
		{
			$table->integer('prefix_id', true);
			$table->string('prefix', 4)->default('')->index('idx_prefix')->comment('字首(四碼大寫英數字)');
			$table->string('name', 32)->default('')->index('idx_name')->comment('活動名稱(公司名稱或是活動名稱)');
			$table->integer('date_create')->default(0)->comment('資料建立日期');
			$table->boolean('flag')->default(0)->index('flag')->comment('資料識別');
			$table->boolean('free')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('pcode_prefix');
	}

}
