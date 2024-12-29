<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','userID','bookID','rate'];
}
