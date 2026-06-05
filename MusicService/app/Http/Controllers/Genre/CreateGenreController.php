<?php

namespace App\Http\Controllers\Genre;

use App\Events\SongCreatedEvent;
use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class CreateGenreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Genre::create([
            'name' => $request->name
        ]); 

        return response()->json([
            'status' => 'success'
        ]);
    }
}
