<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_products', function(Blueprint $table)
		{
			$table->increments('present_id');
			$table->integer('brand_id')->nullable()->default(0)->comment('品牌ID，mapping gomaji.products_attribute.pa_id AND products_attribute_type = 5');
			$table->integer('store_id')->unsigned()->default(0)->comment('store_info.store_id');
			$table->text('store_name', 65535)->comment('店家顯示名稱');
			$table->integer('group_id')->unsigned()->default(0)->comment('問題來往內容');
			$table->integer('category_id')->unsigned()->default(0)->comment('product_category');
			$table->string('product_name', 254)->comment('商品名');
			$table->integer('price')->unsigned()->default(0)->comment('售價');
			$table->integer('org_price')->unsigned()->default(0)->comment('原價');
			$table->integer('costs')->unsigned()->default(0)->comment('GOMAJI進貨價');
			$table->integer('shipping_fee_type')->unsigned()->default(0)->comment('是否要運費');
			$table->integer('qty_s')->unsigned()->default(0)->comment('運費條件－起');
			$table->integer('qty_e')->unsigned()->default(0)->comment('運費條件－迄');
			$table->integer('qty_f')->unsigned()->default(0)->comment('免運條件');
			$table->integer('shipping_fee')->unsigned()->default(0)->comment('運費');
			$table->integer('shipments')->unsigned()->default(0)->comment('詳見flag_mapping');
			$table->integer('shipments_days')->unsigned()->default(0)->comment('寄送天數');
			$table->integer('shipments_type')->unsigned()->default(0)->comment('詳見flag_mapping');
			$table->string('logistics')->comment('運送方式');
			$table->string('other_logistics')->comment('其它運送方式');
			$table->integer('certificate')->unsigned()->default(0)->comment('詳見flag_mapping');
			$table->integer('particular')->unsigned()->default(0)->comment('詳見flag_mapping');
			$table->integer('particular_date')->unsigned()->default(0)->comment('即期品，到期日');
			$table->string('memo')->comment('備註');
			$table->integer('inventory')->unsigned()->default(0)->comment('是否有庫存 0 否 1 是');
			$table->integer('sp_flag')->unsigned()->default(0)->comment('是否多方案 0 否 1 是');
			$table->integer('sp_count')->unsigned()->default(0)->comment('方案數');
			$table->text('link_refer', 65535)->comment('參考用網址連結，因可一直增加，字數較多');
			$table->string('file_refer', 2048)->comment('參考檔案上傳後的位置連結，因可一直增加，字數較多');
			$table->text('specs', 65535)->comment('規格 因可一直增加  字數較多');
			$table->text('feature', 65535)->comment('商品特色');
			$table->integer('material')->unsigned()->comment('供檔狀態');
			$table->string('material_file')->comment('圖檔位置，只有一個');
			$table->string('material_pid')->comment('參考的PID');
			$table->string('material_memo')->comment('參考memo');
			$table->string('slider_pic', 512)->comment('輪播圖最多五張');
			$table->integer('invoice_type')->unsigned()->default(0)->comment('發票狀態');
			$table->integer('store_contact_id')->unsigned()->default(0)->comment('store_contact.reporter_to_store');
			$table->integer('verify')->nullable()->comment('審核狀態 NULL 未送審 0 送審 1 顧問審核通過 2 主管審核通過 －1 退件');
			$table->integer('verify_ts')->unsigned()->default(0)->comment('審核時間');
			$table->integer('ask_flag')->unsigned()->default(0)->comment('問題狀態');
			$table->integer('product_id')->unsigned()->default(0)->comment('product.product_id');
			$table->integer('republish')->unsigned()->default(0)->comment('1 分次銷售 2 分次異動');
			$table->integer('parent_id')->unsigned()->default(0)->comment('分次時 上一檔PID');
			$table->integer('sales_id')->unsigned()->default(0)->comment('顧問ID');
			$table->integer('create_ts')->unsigned()->default(0)->comment('建立時間');
			$table->boolean('flag')->default(0)->comment('0.有效:1.無效');
			$table->string('copy_change_memo')->default('')->comment('異動內容');
			$table->boolean('use_parent_product_inventory')->default(0)->comment('1.使用父檔的庫存表:0.使用提品新庫存');
			$table->integer('pickup_bflag')->default(0)->comment('參見flag_mapping，0:不可超取,1:全家超取,2:7-11,4:萊爾富,8:B2C,16:C2C');
			$table->integer('store_pickup_max')->nullable()->default(0)->comment('超取交易可購上限數');
			$table->text('spec', 65535)->comment('規格，因可一直增加，使用 json format，取代 specs 欄位');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_products');
	}

}
