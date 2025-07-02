<?php
require_once __DIR__ . '/../db.php';

$id = intval($_GET['id']);
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'] ?? null;
$email = $data['email'] ?? null;

if (!$name || !$email) {
    http_response_code(400);
    echo json_encode(["error" => "Nom et email requis"]);
    exit;
}

$stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->bind_param("ssi", $name, $email, $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Utilisateur mis à jour"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Erreur lors de la mise à jour"]);
}
