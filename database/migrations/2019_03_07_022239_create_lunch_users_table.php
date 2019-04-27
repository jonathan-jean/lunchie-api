<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLunchUsersTable extends Migration {

	public function up()
	{
		Schema::create('lunch_users', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lunch_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->datetime('accepted_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('lunch_users');
	}
}