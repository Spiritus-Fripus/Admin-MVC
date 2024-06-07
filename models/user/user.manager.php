<?php

require_once '../config/connect.php';
function showAllUser(): bool|array
{
    $db = connectToDatabase();
    $sql = "SELECT * FROM table_user";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

}