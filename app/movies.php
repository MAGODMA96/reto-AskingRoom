<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    protected $fillable = [
        'title',
        'year',
        'imdbid',
        'poster'
    ];


    protected $hidden = [
        'id',
    ];
}
