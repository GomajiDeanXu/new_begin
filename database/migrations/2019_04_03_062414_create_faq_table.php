<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq', function(Blueprint $table)
		{
			$table->integer('faq_id', true)->comment('FAQ ID');
			$table->smallInteger('category_id')->default(0)->comment('FAQ類別ID');
			$table->text('question', 65535)->nullable()->comment('問');
			$table->text('answer', 65535)->nullable()->comment('答');
			$table->smallInteger('faq_order')->default(0)->comment('FAQ 排序');
			$table->boolean('flag')->default(0)->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faq');
	}

}
