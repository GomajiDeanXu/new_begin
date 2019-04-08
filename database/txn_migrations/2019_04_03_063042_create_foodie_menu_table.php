<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodieMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('foodie_menu', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('productId')->default(0)->index('productId')->comment('product_id');
			$table->integer('productSpid')->default(0)->index('productSpid')->comment('sp_id');
			$table->integer('groupId')->default(0)->index('groupId')->comment('GID分店ID group_id');
			$table->integer('maxCapcity')->nullable()->default(0)->comment('每筆外送最大可兌換數量');
			$table->string('pickGroupName', 191)->default('0')->comment('菜單類別');
			$table->integer('pickNumberFrom')->default(0)->comment('可選數量');
			$table->integer('pickNumberTo')->default(0)->comment('被選數量');
			$table->string('optionsNames', 191)->default('0')->comment('選項名稱 菜名');
			$table->timestamp('lastUpdatedTime')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->index(['productId','productSpid','groupId','pickGroupName','optionsNames'], 'mainkey');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('foodie_menu');
	}

}
