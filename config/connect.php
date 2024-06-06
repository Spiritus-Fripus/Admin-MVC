<?php
function connectToDatabase()
{
    $config = require '../config/connect.env.php';

    try {
        $db = new PDO("mysql:host=" . $config['HOST'] . ";dbname=" . $config['DB_NAME'] . ";charset=utf8", $config['DB_USER'], $config['DB_PASSWORD']);
    } catch (PDOexception $e) {
        die($e->getMessage());
    }
    return $db;
}