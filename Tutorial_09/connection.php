<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
try {
    $connection = new PDO("mysql:host=$serverName", $userName, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed" . $e->getMessage();
}
?>
