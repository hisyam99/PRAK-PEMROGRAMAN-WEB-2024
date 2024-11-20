<?php

namespace app\Traits;

// Trait untuk formatting response
trait ApiResponseFormatter
{
    public function apiResponse($code = 200, $message = "success", $data = [])
    {
        // Memformat response ke dalam bentuk JSON
        return json_encode([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ]);
    }
}
