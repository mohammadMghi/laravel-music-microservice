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
    
        return response('', 200, [
            'Content-Type' => 'audio/mpeg',
            'X-Accel-Redirect' => '/protected-music/' . $music->path,
            'Accept-Ranges' => 'bytes',
        ]);
    }
}