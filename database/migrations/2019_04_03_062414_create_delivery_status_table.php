<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_status', function(Blueprint $table)
		{
			$table->integer('ds_id', true);
			$table->integer('com_id')->default(0)->index('idx_com_id')->comment('物流商[1:黑貓 / 2:宅配通]\' ');
			$table->string('status_id', 5)->default('0')->index('idx_status_id')->comment('貨態代碼');
			$table->string('status_des', 45)->default('')->comment('貨態說明');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('資料有效否[0:無效資料 / 1:有效資料(預設)]');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('delivery_status');
	}

}
