<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LunchUser extends Model 
{

    protected $table = 'lunch_users';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function lunch() {
        return $this->belongsTo(Lunch::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}