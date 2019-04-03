<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_type', function(Blueprint $table)
		{
			$table->integer('tk_type_id', true);
			$table->integer('store_id')->default(0)->comment('店家編號');
			$table->string('name', 45)->default('')->comment('類別名稱');
			$table->boolean('flag')->default(1)->comment('狀態');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('safety_num')->default(0)->comment('安全張數');
			$table->integer('highQty')->nullable()->default(99999)->comment('最高庫存');
			$table->string('creator', 45)->default('')->comment('建立人員');
			$table->string('adjuster', 45)->nullable()->default('')->comment('調整人員');
			$table->integer('adjust_ts')->nullable()->default(0)->comment('調整時間');
			$table->smallInteger('erp_type')->nullable()->default(0)->comment('erp類別');
			$table->string('COMMENT', 256)->nullable()->default('')->comment('註解');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_type');
	}

}
