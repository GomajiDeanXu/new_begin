<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResearchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('research', function(Blueprint $table)
		{
			$table->integer('research_id', true);
			$table->string('city_id', 16)->default('')->index('idx_city_id');
			$table->string('store_name', 45)->index('idx_store_name')->comment('店名');
			$table->string('store_tel', 45)->comment('電話');
			$table->string('store_address', 45)->comment('地址');
			$table->boolean('category_id')->default(0)->index('idx_category_id')->comment('分類');
			$table->string('theme', 45)->comment('主題');
			$table->string('refer_website')->comment('參考網址');
			$table->string('refer_info')->comment('資料來源');
			$table->text('memo', 65535)->comment('備註');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('主管認領後產生的store_id
要回填至此欄');
			$table->integer('create_ts')->default(0)->comment('建立資料時間');
			$table->boolean('claim_flag')->default(0)->comment('認領標記');
			$table->integer('claim_ts')->default(0)->comment('認領時間');
			$table->integer('sales_id')->default(0)->index('idx_sales_id')->comment('認領sales_id');
			$table->boolean('flag')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('research');
	}

}
