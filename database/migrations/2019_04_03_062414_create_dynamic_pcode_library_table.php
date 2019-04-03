<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDynamicPcodeLibraryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dynamic_pcode_library', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('wording', 10)->nullable()->unique('index_wording')->comment('字庫');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dynamic_pcode_library');
	}

}
