<?php
require_once __DIR__ . '/../db.php';

$id = intval($_GET['id']);
$stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Utilisateur supprimé"]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Erreur lors de la suppression"]);
}
