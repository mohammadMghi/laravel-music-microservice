<?php

namespace App\Models;

use App\Events\PlayListCreated;
use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    protected $fillable = [
        'song_id'
    ];

    public static function playListCreated()
    {
        PlayListCreated::dispatch();
    }
}
