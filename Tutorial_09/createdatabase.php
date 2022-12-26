<?php
require_once("connection.php");
if ($connection) {
    $sql = "CREATE DATABASE Tutorial_08";
    $connection ->prepare($sql);
    echo "DataBase Created Successfully";
} else {
    echo "Connection Problem";
}
?>
