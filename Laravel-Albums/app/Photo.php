<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fileable = ['album_id', 'name', 'intro', 'src']; 
}
