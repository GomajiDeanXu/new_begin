<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpStoreMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sp_store_mapping', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('對應至gomaji.store_info.store_id');
			$table->integer('sm_id')->default(0)->comment('超商代號：2：全家，3：7-11，4：萊爾富');
			$table->string('sm_store_id', 20)->default('0')->comment('子廠商代號');
			$table->string('return_cycle', 10)->default('0')->comment('參照flag_mapping: 0：Byweek每週，1：by day日退(隔天收退)，2：當日退(進貨時收退)');
			$table->string('return_day', 10)->default('3')->comment('參照flag_mapping: 1：週一，2：週二，3：週三，4：週四，5：週五，6：週六，7：週日');
			$table->string('return_mode', 10)->default('3')->comment('參照flag_mapping: 全家的設定： 1：自行取貨，2：全家日翊物流，3：統一速達(宅急便)，4：宅配通，5：新竹貨運， 6：大榮貨運，9：其他貨運');
			$table->string('return_mode_other', 40)->default('0')->comment('尚return_mode = 9(其他)時，此欄位需要填入資訊');
			$table->integer('create_ts')->default(0)->comment('row data 建立時間');
			$table->string('modify_by', 20)->default('')->comment('記錄最後維護人員');
			$table->integer('modify_ts')->default(0)->comment('row data 修改時間');
			$table->index(['sm_id','sm_store_id'], 'idx1_sp_store_mapping');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sp_store_mapping');
	}

}
