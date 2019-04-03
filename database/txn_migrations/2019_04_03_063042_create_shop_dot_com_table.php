<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopDotComTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('shop_dot_com', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->string('rid')->default('');
			$table->string('click_id')->default('');
			$table->string('gym_tripid', 20)->nullable()->default('0')->comment('購有錢交易的使用者ID');
			$table->boolean('partner_type')->nullable()->comment('1:美安, 2:購有錢, 3:Line 購物, 4:ShopBack');
			$table->integer('create_ts')->default(0);
			$table->string('line_ecid')->nullable()->comment('line 購物追蹤 id');
			$table->string('transaction_id')->default('')->comment('shopback 訂單追蹤碼');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('shop_dot_com');
	}

}
