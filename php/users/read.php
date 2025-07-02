<?php
require '../db.php';

$result = $mysqli->query("SELECT * FROM users ORDER BY id DESC");
$users = [];

while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);
