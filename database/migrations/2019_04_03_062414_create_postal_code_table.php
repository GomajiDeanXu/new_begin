<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostalCodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postal_code', function(Blueprint $table)
		{
			$table->integer('postal_id', true);
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('城市ID');
			$table->boolean('postal_city_id')->nullable()->index('idx_postal_city_id');
			$table->string('postal_name', 36)->default('')->comment('行政區(中文)');
			$table->string('postal_code', 5)->nullable()->index('idx_post_code')->comment('郵遞區號');
			$table->boolean('postal_order')->default(0)->comment('城市排序(由大到小)');
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
		Schema::drop('postal_code');
	}

}
