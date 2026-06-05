<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class ListGenreController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'status' => 'success',
            'data' => Genre::all()->toArray()
        ]);
    }
}
