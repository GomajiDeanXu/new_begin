<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQcPreviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('qc_preview', function(Blueprint $table)
		{
			$table->increments('qc_preview_id');
			$table->integer('store_contact_id')->default(0)->comment('store_contact.store_contact_id');
			$table->boolean('channel')->default(0)->comment('上檔BU');
			$table->smallInteger('city_id')->default(0)->comment('上檔城市');
			$table->text('pre_product_name', 65535)->nullable()->comment('方案');
			$table->integer('display')->default(0);
			$table->text('qc_command', 65535)->nullable()->comment('QC注意事項');
			$table->text('reject_reason', 65535)->nullable()->comment('退件原因');
			$table->boolean('status')->default(1)->comment('狀態(0: 刪除 / 1: 審核中 / 2: 退件 / 3: 通過 / 4: 已使用)');
			$table->integer('create_ts')->default(0)->comment('送件時間');
			$table->integer('pass_ts')->default(0)->comment('審核時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('qc_preview');
	}

}
