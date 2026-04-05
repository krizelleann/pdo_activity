<?php

$host = 'localhost';      // Usually localhost for XAMPP
$dbname = 'rock_concert'; // The name of the database you just created
$username = 'root';       // Default XAMPP username
$password = '';           // Default XAMPP password is empty

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully to " . $dbname;

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>