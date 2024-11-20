<?php

// Allow all origins (for development purposes)
header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods (e.g., GET, POST, PUT, DELETE)
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Allow certain headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Content-Type header
header("Content-Type: application/json; charset=UTF-8");

include "Routes/ServiceRoutes.php";

use backend\Routes\ServiceRoutes;

// Menangkap request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle preflight OPTIONS request
if ($method == "OPTIONS") {
    // Respond with a 200 status for preflight requests
    http_response_code(200);
    exit;
}

// Menangkap request path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Panggil routes
$serviceRoutes = new ServiceRoutes();
$serviceRoutes->handle($method, $path);
