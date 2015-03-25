<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('title');
			$table->text('content');
			$table->integer('is_show_everyone')->default(0);
			$table->boolean('is_delete')->default(false);
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
		Schema::drop('system_messages');
	}

}
