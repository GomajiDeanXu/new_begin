<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contract_files', function(Blueprint $table)
		{
			$table->integer('contract_id', true)->comment('合約檔案ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->boolean('channel')->default(0)->index('idx_channel')->comment('頻道ID');
			$table->integer('type')->default(0)->index('idx_type')->comment('合約類別');
			$table->boolean('sub_type')->default(0)->comment('主約子類別');
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id(在排程中上傳才會有)');
			$table->integer('qc_preview_id')->default(0)->index('idx_qc_preview_id')->comment('qc_preview.qc_preview_id(QC諮詢上傳才有)');
			$table->integer('pre_schedule_id')->default(0)->index('idx_pre_schedule_id')->comment('product_pre_schedule.schedule_id(取號號碼)');
			$table->string('file_name', 200)->nullable()->comment('檔名');
			$table->string('memo')->nullable()->comment('備註');
			$table->integer('upload_sales')->nullable()->comment('上傳的行銷顧問ID');
			$table->integer('upload_ts')->default(0)->comment('上傳時間');
			$table->string('invalidate_reason')->nullable()->comment('作廢原因');
			$table->integer('invalidate_sales')->nullable()->comment('作廢的行銷顧問ID');
			$table->integer('invalidate_ts')->default(0)->comment('作廢時間');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('(1: 正常合約 / 2: 合約已作廢)');
			$table->integer('group_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contract_files');
	}

}
