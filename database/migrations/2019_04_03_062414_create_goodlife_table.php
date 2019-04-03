<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodlifeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goodlife', function(Blueprint $table)
		{
			$table->integer('goodlife_id')->unsigned()->unique('idx_goodlife_id');
			$table->string('company', 10)->index('idx_company');
			$table->string('link');
			$table->string('city', 10)->index('idx_city');
			$table->string('title');
			$table->string('start_date', 10)->index('idx_start_date');
			$table->boolean('end_date')->index('idx_end_date');
			$table->integer('org_price')->unsigned();
			$table->integer('price')->unsigned();
			$table->integer('count')->unsigned();
			$table->string('store_name', 32);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goodlife');
	}

}
