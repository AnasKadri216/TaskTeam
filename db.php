<?php
$host = 'localhost';
$db   = 'taskteam';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}
?>
