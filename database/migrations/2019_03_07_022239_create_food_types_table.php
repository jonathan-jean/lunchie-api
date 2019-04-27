<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodTypesTable extends Migration {

	public function up()
	{
		Schema::create('food_types', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('food_types');
	}
}