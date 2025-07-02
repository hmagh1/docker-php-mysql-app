<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json");

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Routeur
if ($method === 'POST' && preg_match('#^/users/?$#', $requestUri)) {
    require 'users/create.php';
} elseif ($method === 'GET' && preg_match('#^/users/?$#', $requestUri)) {
    require 'users/read.php';
} elseif ($method === 'GET' && preg_match('#^/users/(\d+)$#', $requestUri, $matches)) {
    $_GET['id'] = $matches[1];
    require 'users/read_one.php';
} elseif ($method === 'PUT' && preg_match('#^/users/(\d+)$#', $requestUri, $matches)) {
    $_GET['id'] = $matches[1];
    require 'users/update.php';
} elseif ($method === 'DELETE' && preg_match('#^/users/(\d+)$#', $requestUri, $matches)) {
    $_GET['id'] = $matches[1];
    require 'users/delete.php';
} else {
    http_response_code(404);
    echo json_encode(["message" => "Route not found", "uri" => $requestUri, "method" => $method]);
}
