<?php
// Include the database connection
require 'dbconfig.php';

$sql = "SELECT * FROM attendances";
$stmt = $pdo->prepare($sql);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>All Concert Attendances:</h3>";
echo "<pre>";
print_r($results);
echo "</pre>";
?>