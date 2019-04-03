<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMappingDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mapping_data', function(Blueprint $table)
		{
			$table->increments('md_id');
			$table->boolean('mapping_type')->comment('設定值的類型(程式取用條件)，參見flag_mapping');
			$table->string('mapping_desc', 200)->nullable()->default('')->comment('設定值的描述');
			$table->string('config_table', 50)->nullable()->default('')->comment('設定值的table');
			$table->string('config_field', 50)->nullable()->default('')->comment('設定值的欄位');
			$table->integer('config_value')->nullable()->default(0)->comment('設定值(數字類型)');
			$table->string('config_char_value', 100)->nullable()->default('')->comment('設定值(文字類型)');
			$table->string('mapping_table', 100)->nullable()->default('')->comment('config對應的設定值(Table)');
			$table->string('mapping_field', 100)->nullable()->default('')->comment('config對應的設定值(Field)');
			$table->integer('mapping_value')->nullable()->default(0)->comment('config_value對應的設定值(數字類型)');
			$table->string('mapping_char_value', 100)->nullable()->default('')->comment('config_value對應設定值(文字類型)');
			$table->boolean('flag')->nullable()->default(1)->comment('1:有效，0:無效');
			$table->integer('bflag')->nullable()->default(0)->comment('未使用');
			$table->string('memo', 100)->nullable();
			$table->integer('create_ts')->nullable()->default(0)->comment('建立時間');
			$table->string('create_user', 30)->comment('建立人員');
			$table->integer('modify_ts')->nullable()->default(0)->comment('異動時間');
			$table->string('modify_user', 30)->nullable()->default('')->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mapping_data');
	}

}
