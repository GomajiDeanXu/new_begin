<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branch_tag', function(Blueprint $table)
		{
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->integer('mbranch_id')->default(0)->index('idx_mbranch_id');
			$table->integer('btag_id')->index('idx_btag_id')->comment('對應branch_tag_mapping');
			$table->boolean('flag')->default(0)->comment('0：無1：有');
			$table->string('statement', 32)->default('')->comment('此tag的額外說明');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('branch_tag');
	}

}
