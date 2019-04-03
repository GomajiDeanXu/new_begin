<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamiportInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('famiport_info', function(Blueprint $table)
		{
			$table->string('agent_type', 8)->default('')->index('idx_agent_type')->comment('商店代理類型');
			$table->integer('id', true);
			$table->string('com_no', 8)->default('')->comment('統一編號');
			$table->string('termi_no', 15)->default('')->comment('廠商代碼');
			$table->string('collect_no', 15)->default('')->comment('代收代號');
			$table->string('xml_to', 10)->default('')->comment('通路目的地代號');
			$table->string('fami_acc', 15)->default('')->comment('廠商網路服務帳號');
			$table->string('fami_pwd', 10)->default('')->comment('廠商網路服務密碼');
			$table->string('url_pay')->default('')->comment('立案URL');
			$table->string('url_feedback')->default('銷案URL');
			$table->string('status', 8)->default('')->index('idx_status')->comment('dev:開發 / online: 正式');
			$table->string('memo')->nullable()->comment('註解');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('famiport_info');
	}

}
