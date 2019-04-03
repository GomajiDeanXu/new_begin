<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductExtendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_extend', function(Blueprint $table)
		{
			$table->integer('auto_id', true)->comment('PKey');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->boolean('channel')->default(0)->index('idx_channel');
			$table->boolean('invoice_type')->default(0)->comment('店家請款方式 [ 0:預設值(未定義) / 1:應稅發票 / 2:收據 / 3:免稅發票 / 4:個人一時貿易所得 / 5:購票證明 ]');
			$table->boolean('type')->default(0)->comment('參見flag_mapping');
			$table->integer('create_ts')->default(0);
			$table->integer('expiry_ts_extend')->default(0);
			$table->string('schedule_type', 10)->nullable();
			$table->integer('schedule_type_ts');
			$table->boolean('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_extend');
	}

}
