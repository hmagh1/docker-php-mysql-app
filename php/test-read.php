<?php
require 'db.php';

$result = $mysqli->query("SELECT * FROM users");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
