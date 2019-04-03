<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->integer('sales_id', true);
			$table->char('sales_pid', 10)->index('idx_sales_id');
			$table->char('sales_pass', 32);
			$table->string('ch_name', 12)->index('idx_ch_name');
			$table->string('en_name', 45);
			$table->string('phone', 16);
			$table->string('address', 45);
			$table->string('email', 45);
			$table->boolean('sex')->index('idx_sex');
			$table->integer('city_id')->index('idx_city_id');
			$table->string('postal_ids', 300)->default('')->comment('行政區');
			$table->boolean('channel')->default(1)->index('channel')->comment('負責的產品類別');
			$table->integer('manager_id')->default(0)->index('manager_id')->comment('所屬主管ID');
			$table->integer('is_leader')->default(0)->comment('主管職');
			$table->boolean('enable_store_assign')->default(0);
			$table->integer('max_stores')->default(0);
			$table->boolean('assign_flag')->default(0)->index('idx_assign_flag');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('停權與否');
			$table->integer('dep_map')->default(0)->index('dep_map')->comment('部門');
			$table->integer('support_id')->default(0)->comment('支援的 CRM');
			$table->integer('arrive_ts')->default(0)->index('arrive_ts')->comment('到職日');
			$table->integer('quit_ts')->default(0)->index('quit_ts')->comment('職職日');
			$table->integer('uphold_id')->default(0)->comment('同組行銷顧問');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales');
	}

}
