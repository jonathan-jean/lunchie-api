<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLunchStatusTypesTable extends Migration {

	public function up()
	{
		Schema::create('lunch_status_types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('lunch_status_types');
	}
}