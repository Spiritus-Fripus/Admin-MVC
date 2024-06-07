<?php

require_once '../config/connect.php';
function connect($email)
{
    $db = connectToDatabase();
    $sql = "SELECT user_password ,user_mail, user_type_id, user_id 
    FROM table_user 
    WHERE user_mail = :mail ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("mail", $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function disconnect(): never
{
    $_SESSION['user_mail'] = '';
    $_SESSION['user_type'] = '';
    $_SESSION['user_id'] = '';
    session_destroy();
    header('Location: /');
    exit();
}
