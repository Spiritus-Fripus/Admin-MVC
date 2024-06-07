<?php

require_once '../config/connect.php';
function getAllAbsence(): bool|array
{
    $db = connectToDatabase();
    $sql = "SELECT * FROM table_absence WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllAbsenceByUserId(): bool|array
{
    $db = connectToDatabase();
    $sql = 'SELECT * FROM table_absence WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    return $stmt->fetchAll();
}

function addAbsence(): void
{
    $db = connectToDatabase();
    $sql = "INSERT INTO table_absence 
    (absence_date_start, absence_date_end, absence_date_declaration, absence_type_id, user_id) 
    VALUES (:absence_date_start, :absence_date_end, :absence_date_declaration, :absence_type_id, :user_id)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':absence_date_declaration', date('Y-m-d'));
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->bindValue(':absence_date_end', $_POST['absence_date_end']);
    $stmt->bindValue(':absence_date_start', $_POST['absence_date_start']);
    $stmt->bindValue(':absence_type_id', $_POST['absence_type_id']);
    $stmt->execute();
}

function updateAbsence(): void
{
    $db = connectToDatabase();
    $sql = "UPDATE table_absence 
    SET 
    absence_date_start = :absence_date_start,
    absence_date_end = :absence_date_end,
    absence_date_declaration = :absence_date_declaration,
    absence_type_id = :absence_type_id
    WHERE (absence_id = :absence_id , user_id = :user_id)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':absence_date_start', $_POST['absence_date_start']);
    $stmt->bindValue(':absence_date_end', $_POST['absence_date_end']);
    $stmt->bindValue(':absence_date_declaration', $_POST['absence_date_declaration']);
    $stmt->bindValue(':absence_type_id', $_POST['absence_type_id']);
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->execute();
}

function deleteAbsence(): void
{
    $db = connectToDatabase();
    $sql = "DELETE FROM table_absence WHERE absence_id = :absence_id AND user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':absence_id', $_POST['absence_id']);
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->execute();
}
