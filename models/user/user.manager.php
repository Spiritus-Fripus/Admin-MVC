<?php

require_once '../config/connect.php';

function showAllUser(): bool|array
{
    $db = connectToDatabase();
    $sql = "SELECT * FROM table_user WHERE user_archive = 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getUserById($user_id)
{
    $db = connectToDatabase();
    $sql = 'SELECT * FROM table_user WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch();
}

function archiveUser($user_id)
{
    $db = connectToDatabase();
    $sql = "UPDATE table_user SET user_archive = 0 WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":user_id", $user_id);
    $stmt->execute();
    return $stmt->fetch();

}

function archiveUserIntoTable($user_id): void
{
    $db = connectToDatabase();

    // Sélectionner les données de l'utilisateur
    $sql = 'SELECT user_name, user_firstname, user_mail, user_gender, user_phonenumber, user_type_id FROM table_user WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $userData = $stmt->fetch();

    if ($userData) {
        // Insertion des données dans la table d'archive
        $sql = "INSERT INTO table_user_archive (user_archive_name, user_archive_firstname, user_archive_mail, user_archive_gender, user_archive_phonenumber, user_archive_type_id) 
                VALUES (:user_name, :user_firstname, :user_mail, :user_gender, :user_phonenumber, :user_archive_type_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':user_name', $userData['user_name']);
        $stmt->bindValue(':user_firstname', $userData['user_firstname']);
        $stmt->bindValue(':user_mail', $userData['user_mail']);
        $stmt->bindValue(':user_gender', $userData['user_gender']);
        $stmt->bindValue(':user_phonenumber', $userData['user_phonenumber']);
        $stmt->bindValue(':user_archive_type_id', $userData['user_type_id']);
        $stmt->execute();
    }
}

function updateUser(): void
{
    $db = connectToDatabase();

    $sql = "UPDATE table_user 
            SET 
                user_name = :user_name, 
                user_firstname = :user_firstname, 
                user_mail = :user_mail, 
                user_phonenumber = :user_phonenumber,
                user_birthday_date = :user_birthday_date,
                user_gender = :user_gender,
                user_type_id = :user_type_id
            WHERE user_id = :user_id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_name', $_POST['name']);
    $stmt->bindValue(':user_firstname', $_POST['firstname']);
    $stmt->bindValue(':user_mail', $_POST['mail']);
    $stmt->bindValue(':user_phonenumber', $_POST['phone']);
    $stmt->bindValue(':user_birthday_date', $_POST['birthday']);
    $stmt->bindValue(':user_gender', $_POST['gender']);
    $stmt->bindValue(':user_type_id', $_POST['user_type_id']);
    $stmt->bindValue(':user_id', $_POST['user_id']);
    $stmt->execute();
}
