<?php

session_start();

try {
    $user = "root";
    $pass = "ueuf3900";
    $host = "localhost";
    $db = "pizzaria";

    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch (PDOException $e) {
    print "Error: " . $e->getMessage();
    die();
}
