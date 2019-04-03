<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodieOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('foodie_order', function(Blueprint $table)
		{
			$table->increments('foodie_id');
			$table->integer('purchase_id')->default(0)->index('purchase_id');
			$table->integer('gm_uid')->default(0);
			$table->string('status', 10)->default('paid');
			$table->string('deliveryDatetime', 25);
			$table->string('deliveryAddress', 100);
			$table->string('deliveryContact', 100);
			$table->string('contactPhone', 50);
			$table->string('contactEmail', 100);
			$table->bigInteger('foodieBillno')->comment('訂單編號_外送券');
			$table->integer('foodie_purchase_id')->default(0);
			$table->bigInteger('purchaseBillno')->comment('訂單編號_餐卷');
			$table->string('purchaseCoupon', 500)->default('')->comment('coupon code');
			$table->smallInteger('couponCount')->default(0);
			$table->string('purchaseBranchName', 100)->default('');
			$table->string('realBranchAddress', 100)->default('');
			$table->text('foodieDetail', 65535);
			$table->text('foodieNote', 65535);
			$table->string('orderRef', 20)->default('');
			$table->string('customerOrderId', 50)->default('');
			$table->string('deliveryStatus', 50)->default('');
			$table->string('deliveryFee', 11)->default('');
			$table->string('branchPhone', 50)->default('');
			$table->dateTime('last_updated_time')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('foodie_order');
	}

}
