<?php
require '../db.php';
$id = (int) $_GET['id'];

$stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    echo json_encode($user);
} else {
    http_response_code(404);
    echo json_encode(["error" => "User not found"]);
}
