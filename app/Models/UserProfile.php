<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model 
{

    protected $table = 'user_profiles';
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }

}