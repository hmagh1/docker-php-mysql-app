<?php
$mysqli = new mysqli("mysql", "user", "userpass", "testdb");

if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

echo "✅ Connexion réussie à la base de données!";
?>
