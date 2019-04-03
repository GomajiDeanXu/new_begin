<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->bigInteger('gm_uid', true)->comment('gomaji ?冽?id');
			$table->bigInteger('fb_uid')->nullable()->index('idx_fb_uid')->comment('facebook id');
			$table->bigInteger('y_uid')->nullable()->comment('yahoo id');
			$table->string('reg_email', 45)->index('idx_email');
			$table->string('reg_mobile_phone', 45)->nullable()->index('idx_reg_mobile_phone');
			$table->char('password', 32);
			$table->string('last_email', 45);
			$table->string('full_name', 45)->comment('?典?');
			$table->string('last_mobile_phone', 45)->index('idx_last_mobile_phone');
			$table->integer('city_id')->index('idx_city_id');
			$table->string('pic', 24)->comment('憭折??');
			$table->boolean('email_notify')->default(1)->comment('?臬??亙?email閮??');
			$table->boolean('mobile_notify')->default(1);
			$table->integer('bonus')->default(0)->comment('鞈潛??');
			$table->integer('prepay_money')->default(0)->comment('?脣??');
			$table->integer('register_ts')->default(0)->index('idx_register_ts')->comment('閮餃????');
			$table->string('last_ip', 15)->nullable();
			$table->boolean('account_active')->default(0)->index('idx_acc_active')->comment('?啗酉??董????血??');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('bonus2')->default(0)->comment('FOR 2014／1／1團購金使用）');
			$table->string('device_id', 45)->default('')->comment('device ID');
			$table->boolean('agreement')->nullable()->default(1)->comment('是否簽署使用協議');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
