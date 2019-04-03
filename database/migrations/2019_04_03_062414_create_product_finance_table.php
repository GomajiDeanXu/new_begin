<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_finance', function(Blueprint $table)
		{
			$table->integer('pf_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('rts_id')->default(0);
			$table->integer('create_ts')->default(0);
			$table->string('issuer', 45)->default('')->comment('(代銷)發行人');
			$table->string('issue_company', 45)->default('')->comment('(代銷)發行公司');
			$table->string('invoice_id', 45)->default('')->comment('公司統編');
			$table->string('invoice_address', 45)->default('')->comment('公司地址');
			$table->string('store_tel', 45)->default('')->comment('店家電話');
			$table->string('trust_bank', 45)->default('')->comment('(代銷)票券信託銀行');
			$table->string('trust_url', 128)->default('')->comment('(代銷)銀行票券查詢網址');
			$table->string('bank_code', 11)->default('')->comment('撥款銀行代碼');
			$table->string('bank_branch_code', 11)->default('')->comment('撥款銀行分行代碼');
			$table->string('bank_account_name', 64)->default('')->comment('撥款銀行名稱');
			$table->string('bank_account', 20)->default('')->comment('撥款銀行帳戶');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_finance');
	}

}
