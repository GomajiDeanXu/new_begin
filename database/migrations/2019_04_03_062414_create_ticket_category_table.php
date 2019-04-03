<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_category', function(Blueprint $table)
		{
			$table->increments('ticket_category_id');
			$table->boolean('category_type')->default(1)->comment('1: 主題 / 2: 分類');
			$table->string('ticket_category_name', 30)->default('')->comment('Ticket 主題 / 分類 名稱');
			$table->boolean('flag')->default(1)->comment('0: 不使用 / 1: 使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_category');
	}

}
