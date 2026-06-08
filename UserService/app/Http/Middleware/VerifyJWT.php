<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use File;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request; 

class VerifyJWT
{
    public function handle(Request $request, Closure $next)
    { 
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        $token = substr($authHeader, 7);

        try { 
            $publicKey = File::get(storage_path('oauth-public.key'));

            $decoded = JWT::decode($token, new Key($publicKey, 'RS256'));
 
            $user = User::find($decoded->sub);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 401);
            }
 
            $request->merge(['auth_user' => $user]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Invalid token',
                'message' => $e->getMessage()
            ], 401);
        }

        return $next($request);
    }
}
