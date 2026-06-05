<?php
 
use App\Http\Controllers\Artist\CreateArtistController;
use App\Http\Controllers\Genre\CreateGenreController;
use App\Http\Controllers\Search\SearchSongsController;
use App\Http\Controllers\Song\UploadSongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/v1')->group(function(){
    Route::post('/upload' , UploadSongController::class);

    Route::post('/artist', CreateArtistController::class);
   
    Route::post('/genre', CreateGenreController::class);
});