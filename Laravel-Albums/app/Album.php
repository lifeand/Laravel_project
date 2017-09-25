<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fileable = ['name', 'intro', 'cover']; 
}
