<?php

namespace App\Http\Controllers\Stream;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;

class StreamSongController extends Controller
{
    public function __invoke($id)
    {
        $music = Music::findOrFail($id);
 
        $path = storage_path('app/private/' . $music->path);

        if (!file_exists($path)) {
            abort(404, 'Song file not found');
        }

        return response()->file($path);
    }
}