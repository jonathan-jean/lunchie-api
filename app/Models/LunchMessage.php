<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LunchMessage extends Model 
{

    protected $table = 'lunch_messages';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}