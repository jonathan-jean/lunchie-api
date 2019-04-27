<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfilesTable extends Migration {

	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('tagline');
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('user_profiles');
	}
}