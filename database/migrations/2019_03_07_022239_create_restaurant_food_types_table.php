<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantFoodTypesTable extends Migration {

	public function up()
	{
		Schema::create('restaurant_food_types', function(Blueprint $table) {
			$table->integer('restaurant_id')->unsigned();
			$table->integer('food_type_id')->unsigned();

			$table->primary(['restaurant_id', 'food_type_id']);
		});
	}

	public function down()
	{
		Schema::drop('restaurant_food_types');
	}
}