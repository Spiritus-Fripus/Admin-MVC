<?php


function showInfo()
{
    require '../config/connect.php';

    $sql = "SELECT * FROM table_user WHERE user_mail = :user_mail";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":user_mail", $_SESSION['user_mail']);
    $stmt->execute();
    return $stmt->fetchAll();
}
