<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('email')->unique();
			$table->string('nick_name',30);
			$table->string('password', 60);
			$table->string('repassword',60);
			$table->integer('user_type_id')->default(1);
			$table->string('qq',20);
			$table->string('address');
			$table->string('phone',20);
			$table->string('wechat',20);
			$table->string('alipay',20);
			$table->integer('parent_id');
			$table->integer('score');
			$table->integer('msg_number')->default(0);
			$table->integer('is_admin')->default(0);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
