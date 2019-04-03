<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorePickupMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_pickup_main', function(Blueprint $table)
		{
			$table->integer('sm_main_id', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('mapping transaction.user_purchases.purchase_id');
			$table->integer('product_id')->default(0)->comment('商品ID(對應gomaji.products.product_id)');
			$table->bigInteger('bill_no')->default(0)->comment('訂單編號(對應transaction.user_purchases.bill_no)');
			$table->boolean('status')->default(0)->comment('0：init，1：live，2:dead');
			$table->integer('sm_id')->default(0)->comment('超商代號(對應店舖檔)，2：全家，3：711，4：萊爾富');
			$table->string('sm_store_id', 20)->default('0')->comment('Gomaji廠商的子廠商代號');
			$table->string('sm_shop_id', 10)->default('0')->comment('超取storeId ，非Gomaji的store_id');
			$table->integer('based_fee')->default(0)->comment('單一筆貨運的物流費用');
			$table->integer('create_ts')->default(0)->comment('每天產R02的批次抓此欄位-1天 ');
			$table->string('modify_by', 20)->default('')->comment('記錄最後維護人員');
			$table->integer('modify_ts')->default(0)->comment('row data 修改時間');
			$table->index(['sm_shop_id','sm_id'], 'idx1_store_pickup_main');
			$table->index(['sm_store_id','sm_id'], 'idx2_store_pickup_main');
			$table->index(['purchase_id','status'], 'idx3_store_pickup_main');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_pickup_main');
	}

}
