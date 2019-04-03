<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlagMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flag_mapping', function(Blueprint $table)
		{
			$table->integer('idflag_mapping', true);
			$table->string('db_name', 45)->nullable()->index('idx_db_name')->comment('資料庫名稱');
			$table->string('table_name', 45)->nullable()->index('idx_table_name')->comment('資料表名稱');
			$table->string('column_name', 45)->nullable()->index('idx_column_name')->comment('欄位名稱');
			$table->integer('flag_value')->default(0)->index('idx_flag_value')->comment('欄位的值(數字)');
			$table->string('flag_char_value', 20)->default('')->index('idx_flag_char_value')->comment('欄位的值(字串)');
			$table->string('statement', 45)->nullable()->comment('欄位值對應的狀態');
			$table->boolean('flag')->default(1)->comment('(0: 不使用 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flag_mapping');
	}

}
