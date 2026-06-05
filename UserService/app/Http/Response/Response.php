<?php 

namespace App\Http\Response;

class Response
{
    public function __construct(
        public string $message,
        public int $statusCode
    ){}
}