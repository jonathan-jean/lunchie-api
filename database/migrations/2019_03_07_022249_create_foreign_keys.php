<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('restaurant_food_types', function(Blueprint $table) {
			$table->foreign('restaurant_id')->references('id')->on('restaurants')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('restaurant_food_types', function(Blueprint $table) {
			$table->foreign('food_type_id')->references('id')->on('food_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lunches', function(Blueprint $table) {
			$table->foreign('restaurant_id')->references('id')->on('restaurants')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lunches', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lunch_statuses', function(Blueprint $table) {
			$table->foreign('status_type_id')->references('id')->on('lunch_status_types')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lunch_statuses', function(Blueprint $table) {
			$table->foreign('lunch_id')->references('id')->on('lunches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lunch_users', function(Blueprint $table) {
			$table->foreign('lunch_id')->references('id')->on('lunches')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lunch_users', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('lunch_messages', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('restaurant_food_types', function(Blueprint $table) {
			$table->dropForeign('restaurant_food_types_restaurant_id_foreign');
		});
		Schema::table('restaurant_food_types', function(Blueprint $table) {
			$table->dropForeign('restaurant_food_types_food_type_id_foreign');
		});
		Schema::table('lunches', function(Blueprint $table) {
			$table->dropForeign('lunches_restaurant_id_foreign');
		});
		Schema::table('lunches', function(Blueprint $table) {
			$table->dropForeign('lunches_user_id_foreign');
		});
		Schema::table('lunch_statuses', function(Blueprint $table) {
			$table->dropForeign('lunch_statuses_status_type_id_foreign');
		});
		Schema::table('lunch_statuses', function(Blueprint $table) {
			$table->dropForeign('lunch_statuses_lunch_id_foreign');
		});
		Schema::table('lunch_users', function(Blueprint $table) {
			$table->dropForeign('lunch_users_lunch_id_foreign');
		});
		Schema::table('lunch_users', function(Blueprint $table) {
			$table->dropForeign('lunch_users_user_id_foreign');
		});
		Schema::table('lunch_messages', function(Blueprint $table) {
			$table->dropForeign('lunch_messages_user_id_foreign');
		});
	}
}