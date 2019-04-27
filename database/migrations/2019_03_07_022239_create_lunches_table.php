<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLunchesTable extends Migration {

	public function up()
	{
		Schema::create('lunches', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('restaurant_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->text('description');
			$table->datetime('date');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('lunches');
	}
}