<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLunchStatusesTable extends Migration {

	public function up()
	{
		Schema::create('lunch_statuses', function(Blueprint $table) {
			$table->integer('status_type_id')->unsigned();
			$table->integer('lunch_id')->unsigned();
			$table->timestamps();

			$table->primary(['status_type_id', 'lunch_id']);
		});
	}

	public function down()
	{
		Schema::drop('lunch_statuses');
	}
}