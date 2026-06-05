<?php

namespace App\Http\Controllers\PlayList;

use App\Http\Controllers\Controller;
use App\Models\PlayList;
use App\Models\Song;
use Illuminate\Http\Request;

class AddSongPlayListController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'song_id' => 'required|exists:songs,song_id'
        ]);

        PlayList::create([
            'song_id' => $request->song_id
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
