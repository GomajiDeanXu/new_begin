<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcodeMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('pcode_main', function(Blueprint $table)
		{
			$table->integer('main_id', true);
			$table->integer('agent_id')->default(0)->index('idx_agent_id')->comment('pcode_agent.agent_id');
			$table->string('prefix', 4)->default('')->index('idx_prefix')->comment('字首(四碼大寫英數字)(N954)');
			$table->integer('batch')->default(1)->index('idx_batch')->comment('批號');
			$table->integer('quantity')->default(0)->comment('本批數量');
			$table->string('project', 32)->default('')->comment('專案名稱');
			$table->integer('used_num')->nullable()->default(0)->comment('活動計數使用');
			$table->integer('money')->default(0)->comment('折價金額');
			$table->float('ratio', 11)->default(0.00)->comment('排除%檔次');
			$table->float('discount', 11)->default(0.00)->comment('折抵折數');
			$table->boolean('discount_type')->default(0)->comment('0: 不折抵
1: 金額折抵
2: 折數折抵');
			$table->integer('cost')->default(0)->comment('成本(有價之儲值序號售于合作廠商之批發價)');
			$table->smallInteger('require_amount')->default(0);
			$table->boolean('reward_point')->nullable()->default(0)->comment('宅配贈點%數');
			$table->integer('date_create')->default(0)->comment('建立時間');
			$table->integer('date_start')->default(0);
			$table->integer('date_expiry')->default(0)->index('idx_date_expiry')->comment('使用期限');
			$table->boolean('term')->default(0)->comment('BU折價券效期');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('資料識別');
			$table->boolean('free')->default(0);
			$table->boolean('plat')->default(15);
			$table->smallInteger('type')->nullable();
			$table->string('apply_name', 32)->default('');
			$table->char('pin_code', 6)->default('')->comment('六碼英數字(大寫英文排除I,0，數字排除1,0)');
			$table->string('memo', 254)->nullable()->comment('備註');
			$table->integer('product_id')->default(0)->comment('商品ID(廣告交換2.0使用)');
			$table->boolean('filter_type')->default(2)->comment('1:限制PID/GID，2:限制頻道');
			$table->boolean('filterid_type')->default(1)->comment('1:filter_id=pid,2:filter_id=gid');
			$table->text('filter_id', 65535)->nullable()->comment('對應的欄位需搭配filterid_type:pid or gid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('pcode_main');
	}

}
