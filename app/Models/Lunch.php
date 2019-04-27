<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lunch extends Model 
{

    protected $table = 'lunches';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'date'];

    public function participants() {
        return $this->hasMany(LunchUser::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function messages() {
        return $this->hasMany(LunchMessage::class);
    }

    public function statuses() {
        return $this->hasMany(LunchStatus::class);
    }
}