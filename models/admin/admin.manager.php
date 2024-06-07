<?php

require_once '../config/connect.php';

function showInfo(): bool|array
{
    $db = connectToDatabase();
    $sql = "SELECT * FROM table_user WHERE user_mail = :user_mail";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":user_mail", $_SESSION['user_mail']);
    $stmt->execute();
    return $stmt->fetchAll();
}

function showAllUser(): bool|array
{
    $db = connectToDatabase();
    $sql = "SELECT * FROM table_user";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

}