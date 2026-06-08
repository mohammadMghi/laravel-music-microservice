<?php
 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PlayList\AddSongPlayListController;
use App\Http\Controllers\Profile\GetProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/v1')->group(function(){
    Route::post('/register',RegisterController::class);
    Route::post('/login',LoginController::class);

    Route::post('/playlist' , AddSongPlayListController::class)->middleware('jwt.verify');
    Route::post('/profile' , GetProfileController::class)->middleware('jwt.verify'); 
});