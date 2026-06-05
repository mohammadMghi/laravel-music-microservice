<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CreateArtistController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
 
        Artist::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
