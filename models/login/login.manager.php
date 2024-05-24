<?php

function connect($email)
{
    require "../config/connect.php";

    $sql = "SELECT user_password ,user_mail, user_type_id FROM table_user WHERE user_mail = :mail ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("mail", $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function disconnect()
{
    $_SESSION['user_mail'] = '';
    $_SESSION['user_type'] = '';
    session_destroy();
    header('Location: /');
    exit();
}
