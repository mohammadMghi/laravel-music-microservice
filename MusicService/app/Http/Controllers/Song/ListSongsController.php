<?php

namespace App\Http\Controllers\Song;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;

class ListSongsController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'status' => 'success',
            'data' => Music::all()->toArray()
        ]);
    }
}
