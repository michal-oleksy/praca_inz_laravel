<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','author','genre','datePublished','pages','publisher'];
}


