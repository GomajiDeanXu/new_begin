<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchTagMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branch_tag_mapping', function(Blueprint $table)
		{
			$table->increments('btag_id');
			$table->integer('type')->default(0)->comment('1：氛圍、2：設施');
			$table->string('tag_name', 11)->default('')->comment('tag名稱');
			$table->integer('flag')->default(0)->comment('0無效 1有效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('branch_tag_mapping');
	}

}
