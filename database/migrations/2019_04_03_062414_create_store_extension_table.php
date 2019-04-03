<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreExtensionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_extension', function(Blueprint $table)
		{
			$table->integer('store_id')->primary()->comment('store_info.store_id');
			$table->text('store_boss_speech', 65535)->nullable()->comment('老闆的話');
			$table->string('store_fb')->nullable()->comment('FB粉絲專頁');
			$table->string('store_blog')->nullable()->comment('部落格');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_extension');
	}

}
