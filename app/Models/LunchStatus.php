<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LunchStatus extends Model 
{

    protected $table = 'lunch_statuses';
    public $timestamps = true;

    public function type() {
        return $this->hasOne(LunchStatusType::class);
    }

    public function lunch() {
        return $this->belongsTo(Lunch::class);
    }
}