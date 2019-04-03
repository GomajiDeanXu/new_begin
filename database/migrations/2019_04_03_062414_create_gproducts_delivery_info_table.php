<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGproductsDeliveryInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gproducts_delivery_info', function(Blueprint $table)
		{
			$table->increments('pdi_id');
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('gomaji.products.product_id');
			$table->string('sender_contact_name', 45)->nullable()->comment('寄貨聯絡人姓名');
			$table->string('sender_contact_phone', 40)->nullable()->comment('寄貨聯絡人電話');
			$table->string('sender_contact_email', 200)->nullable()->comment('寄貨聯絡人E-mail');
			$table->string('sender_contact_postal_code', 10)->nullable()->comment('寄貨聯絡人郵遞區號');
			$table->string('sender_contact_address', 45)->nullable()->comment('寄貨聯絡人地址');
			$table->string('sender_contact_info', 200)->nullable()->comment('寄貨聯絡人資訊');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gproducts_delivery_info');
	}

}
