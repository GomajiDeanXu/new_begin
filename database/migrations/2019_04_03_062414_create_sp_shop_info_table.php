<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpShopInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sp_shop_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('sm_id')->default(0)->comment('參照flag_mapping:超商編號：2：全家，3：711，4：萊爾富');
			$table->string('sm_name', 20)->default('0')->comment('超商名稱：全家、711、萊爾富');
			$table->string('sm_shop_id', 10)->default('0')->index('idx_sm_shop_id')->comment('超商門市代號');
			$table->string('origin_shop_id', 10)->default('0')->index('idx_origin_shop_id')->comment('超商原始門市代號');
			$table->string('shop_name', 40)->default('0')->comment('超商門市名稱');
			$table->string('shop_phone', 15)->default('0')->comment('門市電話');
			$table->string('shop_addr', 60)->default('0')->comment('門市地址');
			$table->boolean('status')->default(0)->comment('1：live，2：dead');
			$table->integer('create_ts')->default(0)->comment('row data 建立時間');
			$table->integer('modify_ts')->default(0)->comment('row data 修改時間');
			$table->index(['sm_id','origin_shop_id','status'], 'idx1_sp_shop_info');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sp_shop_info');
	}

}
