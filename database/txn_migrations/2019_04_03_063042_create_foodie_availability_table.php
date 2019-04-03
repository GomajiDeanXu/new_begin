<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodieAvailabilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('foodie_availability', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('productId')->default(0)->index('productId')->comment('gomaji.products.product_id');
			$table->integer('productSpid')->default(0)->index('productSpid')->comment('gomaji.products.sp_id');
			$table->integer('groupId')->default(0)->index('groupId')->comment('GID分店ID gomaji.store_branch_info.group_id');
			$table->string('leadtime', 10)->default('0')->comment('該方案預約最小前置時間 即多久前需預訂 0:無需預約 1h:1小時前 1d:1天前');
			$table->string('sysLeadtime', 10)->default('0')->comment('考慮服務的限制後的該方案預約最小前置時間 目前服務設定為3h');
			$table->boolean('day')->default(0)->comment('星期幾 週一 - 週日: 1 - 7');
			$table->string('time', 254)->default('0')->comment('可預訂時段 不連續時段逗點分隔 ie. 1100-1400, 1730-2130');
			$table->string('dayoff', 254)->nullable()->default('0')->comment('店家指定公休日');
			$table->timestamp('lastUpdatedTime')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->index(['productId','productSpid','groupId','day'], 'mainkey');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('foodie_availability');
	}

}
