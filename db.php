<?php
$host = 'localhost';
$db = 'student_db'; // Your database name
$user = 'root'; // Default XAMPP username for MySQL
$pass = ''; // Default XAMPP password (empty)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
