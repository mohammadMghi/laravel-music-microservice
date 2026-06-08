<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'data' => User::find($request->auth_user->id)
        ]);
    }
}
