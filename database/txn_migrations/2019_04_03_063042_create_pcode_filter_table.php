<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcodeFilterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('pcode_filter', function(Blueprint $table)
		{
			$table->integer('pf_id', true);
			$table->integer('main_id')->default(0)->index('idx_main_id')->comment('transaction.pcode_main.main_id');
			$table->boolean('ch')->default(0)->index('idx_ch')->comment('值為0時代表全頻道可用');
			$table->string('categories')->default('0')->index('idx_categories')->comment('值為0時代表全類別可用');
			$table->string('tags')->default('0')->index('idx_tags')->comment('值為0時代表全tag可用');
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
		Schema::connection('transaction')->drop('pcode_filter');
	}

}
