<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json");

$mysqli = new mysqli("mysql", "user", "userpass", "testdb");

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "DB connect fail", "details" => $mysqli->connect_error]);
    exit;
}

$result = $mysqli->query("SELECT * FROM users");
$users = [];

while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);
