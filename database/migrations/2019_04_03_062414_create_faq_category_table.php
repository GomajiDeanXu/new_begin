<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq_category', function(Blueprint $table)
		{
			$table->smallInteger('category_id', true)->comment('FAQ類別ID');
			$table->string('category_name', 32)->nullable()->comment('FAQ類別名稱');
			$table->smallInteger('category_order')->default(0)->comment('FAQ類別排序');
			$table->boolean('flag')->default(1)->comment('(0:刪除/1:正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faq_category');
	}

}
