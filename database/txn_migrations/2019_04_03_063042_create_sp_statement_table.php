<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpStatementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sp_statement', function(Blueprint $table)
		{
			$table->integer('sm_stmt_id', true);
			$table->string('shipment_no', 20)->default('0')->comment('B2C的貨運編號(13碼)');
			$table->integer('sm_id')->default(0)->comment('超商代號(對應店舖檔)，2：全家，3：711，4：萊爾富');
			$table->integer('status')->comment('與R99 比對的結果：0：init 1：matched 2：unmatched(對帳檔無) 3：unmatched(sp_statement無) ');
			$table->string('spdate', 10)->default('')->comment('該筆shipment_no若收到R96(正或逆向)，將SPDate時間寫入此欄位');
			$table->string('spadate', 10)->default('')->comment('對應 R99 SPADate');
			$table->integer('create_ts')->default(0)->comment('row data 建立時間');
			$table->string('modify_by', 20)->default('0')->comment('記錄最後維護人員');
			$table->integer('modify_ts')->default(0)->comment('row data 修改時間');
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle');
			$table->string('memo')->default('0')->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sp_statement');
	}

}
