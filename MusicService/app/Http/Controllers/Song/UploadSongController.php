<?php

namespace App\Http\Controllers\Song;
 
use App\Http\Controllers\Controller; 
use App\Jobs\ProcessIncomingEvent; 
use App\Models\Music;
use Illuminate\Http\Request;
use Queue;

class UploadSongController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'song' => 'required|mimes:mp3,wav,ogg|max:51200',
            'artist_id' => 'required|int|exists:artists,id',
            'genre_id' => 'required|exists:genres,id'
        ]); 
 
        $path = $request->file('song')->store('songs');
 
        $music = Music::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $path,
            'artist_id' => $request->artist_id,
            'genre_id' => $request->genre_id
        ]);


        ProcessIncomingEvent::dispatch([
            'type' => 'song.created',
            'payload' => [
                'id' => $music->id,
                'title' => $music->title,
                'artist_id' => $music->artist_id
            ]
        ])->onQueue('song.created');

        return response()->json([
            'status' => 'success'
        ]);
    }
}
