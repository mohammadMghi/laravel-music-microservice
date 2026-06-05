<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';

    protected $fillable = [
        'title',
        'description',
        'path',
        'artist_id',
        'genre_id'
    ];
}
