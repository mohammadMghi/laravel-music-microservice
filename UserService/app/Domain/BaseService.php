<?php

namespace App\Domain;

class BaseService
{
    public function success($data,$status = 200) {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ] , $status);
    }

    public function faild($message,$status = 400) {
        return response()->json([
            'status' => 'faild',
            'message' => $message
        ], $status);
    }
}