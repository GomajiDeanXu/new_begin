<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreInfoBackupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_info_backup', function(Blueprint $table)
		{
			$table->integer('store_id', true);
			$table->string('store_name', 45)->comment('摨??');
			$table->string('store_website');
			$table->string('store_menu');
			$table->string('store_tel', 45);
			$table->string('store_fax', 45);
			$table->string('store_address', 45);
			$table->string('store_email', 45);
			$table->text('store_intro', 65535)->comment('??振隞?晶');
			$table->string('store_boss', 16)->comment('??振???');
			$table->string('store_boss_pic', 8);
			$table->integer('store_branch')->default(0)->comment('????');
			$table->integer('store_level_flag')->index('idx_store_level_flag');
			$table->integer('store_order')->default(0)->index('idx_store_order');
			$table->string('business_hours', 128)->nullable();
			$table->string('invoice_id', 45)->comment('?潛巨蝯梁楊');
			$table->string('invoice_address', 45);
			$table->string('invoice_title', 45);
			$table->string('invoice_send_address', 45)->comment('發票寄送地址');
			$table->text('store_event', 65535)->comment('?芣?瘣餃?');
			$table->integer('event_start_ts');
			$table->integer('event_end_ts');
			$table->integer('sales_id')->default(0)->index('idx_agent_id')->comment('銵??憿批?隞?”ID');
			$table->integer('create_ts')->default(0)->index('idx_create_ts');
			$table->boolean('category_id')->default(0)->index('idx_category_id')->comment('憿??ID');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('蝮賡?????啣?');
			$table->boolean('channel')->default(0);
			$table->string('contact_name', 45)->comment('??窗鈭箏??');
			$table->string('contact_title', 16)->comment('??窗鈭箄?蝔');
			$table->string('contact_phone', 45)->comment('?舐窗鈭粹?閰');
			$table->string('contact_email', 45);
			$table->integer('last_contact_ts')->default(0)->comment('?????窗???');
			$table->boolean('contact_status_id')->default(0)->index('idx_contact_status')->comment('0:?芾?蝯?1: ?芣???keyman
2: 撌脩? mail ??蕭頩?3: 撌梁?閮歿n4: ?冽????(隢????酉甈?‵撖急?蝯????');
			$table->boolean('refer_resource_id')->default(0)->index('idx_refer_resource')->comment('??振靘??');
			$table->boolean('creator_user_id')->default(0)->index('idx_creator_user_id')->comment('銝??鈭箏?');
			$table->text('remark', 65535)->comment('??酉');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('last_modify_ts')->default(0);
			$table->boolean('sales_picked')->default(0);
			$table->boolean('is_3g')->default(1);
			$table->integer('system_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_info_backup');
	}

}
