<?php
$host = 'localhost';
$dbname = 'login_system'; // Update to your database name
$username = 'root'; // Update to your database username
$password = ''; // Update to your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
