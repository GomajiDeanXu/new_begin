<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_products', function(Blueprint $table)
		{
			$table->integer('tpid', true);
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('gomaji_psm');
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->string('store_name', 45)->default('')->comment('product_name');
			$table->integer('price')->default(0)->comment('prices');
			$table->integer('date_create')->default(0);
			$table->integer('publish_ts')->default(0)->index('idx_publish_ts');
			$table->char('com_no', 8)->default('');
			$table->boolean('sale_type')->default(0)->index('idx_sale_type');
			$table->char('sale_type_extend', 4)->default('')->index('idx_sale_type_extend');
			$table->string('bank_code', 11)->default('');
			$table->string('bank_branch_code', 11)->default('');
			$table->string('bank_account_name', 64)->default('');
			$table->string('bank_account', 20)->default('0');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('產品資訊是否已上傳至墨攻

0=未上傳
1=已上傳');
			$table->boolean('ratio_flag')->default(0);
			$table->boolean('feedback_flag')->default(0);
			$table->boolean('sp_flag')->default(0)->index('idx_sp_flag');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->boolean('bank_flag')->default(0)->index('idx_bank_flag');
			$table->char('store_sernum', 3)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_products');
	}

}
