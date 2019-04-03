<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_batch', function(Blueprint $table)
		{
			$table->integer('batch_id', true)->comment('批次編號');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家編號');
			$table->integer('tk_type_id')->default(0);
			$table->boolean('type')->default(0)->index('idx_type')->comment('票券類別');
			$table->integer('create_ts')->default(0)->comment('匯入時間');
			$table->integer('expiry_ts')->default(0)->comment('票券到期日');
			$table->smallInteger('price')->unsigned()->default(0)->comment('票券單價');
			$table->integer('supplier_id')->nullable()->default(0)->comment('供應商編號');
			$table->integer('quantity')->nullable()->default(0)->comment('數量');
			$table->integer('start_ts')->nullable()->default(0)->comment('票券使用起始日');
			$table->string('accept_no', 64)->nullable()->default('')->comment('驗收單號，對應 erp.accept.accept_no');
			$table->string('depository_id', 32)->nullable()->default('')->comment('倉庫id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_batch');
	}

}
