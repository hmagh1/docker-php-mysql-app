<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json");
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

switch (true) {
    case $method === 'POST' && $request === '/users':
        require 'users/create.php';
        break;
    case $method === 'GET' && $request === '/users':
        require 'users/read.php';
        break;
    case $method === 'GET' && preg_match('/\/users\/(\d+)/', $request, $matches):
        $_GET['id'] = $matches[1];
        require 'users/read_one.php';
        break;
    case $method === 'PUT' && preg_match('/\/users\/(\d+)/', $request, $matches):
        $_GET['id'] = $matches[1];
        require 'users/update.php';
        break;
    case $method === 'DELETE' && preg_match('/\/users\/(\d+)/', $request, $matches):
        $_GET['id'] = $matches[1];
        require 'users/delete.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Route not found"]);
}

