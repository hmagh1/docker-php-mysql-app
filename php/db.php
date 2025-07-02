<?php
$mysqli = new mysqli("mysql", "user", "userpass", "testdb");
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur de connexion DB"]);
    exit;
}
?>
