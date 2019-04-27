<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model 
{

    protected $table = 'restaurants';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function foodTypes() {
        return $this->hasManyThrough(FoodType::class, 'restaurant_food_types', 'food_type_id', 'restaurant_id');
    }

    public function lunches() {
        return $this->hasMany(Lunch::class);
    }
}