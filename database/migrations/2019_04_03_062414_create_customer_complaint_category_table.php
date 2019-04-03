<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerComplaintCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_complaint_category', function(Blueprint $table)
		{
			$table->integer('cc_category_id', true);
			$table->string('category_name', 64)->default('')->comment('客訴類别名稱');
			$table->boolean('channel')->default(0)->comment('(0: 舊制 / 1: 今日團購 / 2: 一起旅行 / 3: 我餓了 / 4: 宅配)');
			$table->boolean('flag')->default(0)->comment('(0: 不使用 / 1: 正常)');
			$table->boolean('type')->default(0)->comment('1: LB-美食餐飲; 2: LB-美容美髮; 3: LB-休閒娛樂; 4: LB-其他;');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_complaint_category');
	}

}
