<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'] ?? null;
$email = $data['email'] ?? null;

if (!$name || !$email) {
    http_response_code(400);
    echo json_encode(["error" => "Name and email are required"]);
    exit;
}

$stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);
if ($stmt->execute()) {
    http_response_code(201);
    echo json_encode(["message" => "User created", "id" => $stmt->insert_id]);
} else {
    http_response_code(500);
    echo json_encode(["error" => $stmt->error]);
}
