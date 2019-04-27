<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodType extends Model 
{

    protected $table = 'food_types';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function restaurants() {
        return $this->belongsToMany(Restaurant::class, 'restaurant_food_types', 'restaurant_id', 'food_type_id');

    }
}