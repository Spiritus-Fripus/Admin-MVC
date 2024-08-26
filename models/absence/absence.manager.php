<?php

require_once '../config/connect.php';

function getAllAbsence(): bool|array
{
    $db = connectToDatabase();
    $sql = "SELECT * 
            FROM table_absence
            JOIN table_user
            ON table_absence.user_id = table_user.user_id
            ORDER BY `table_absence`.`absence_date_declaration` DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllAbsenceByUserId(): bool|array
{
    $db = connectToDatabase();
    $sql = 'SELECT * 
            FROM table_absence 
            JOIN adminmns.table_absence_type 
            ON table_absence.absence_type_id = table_absence_type.absence_type_id 
            WHERE user_id = :user_id 
            ORDER BY table_absence.absence_date_declaration DESC';
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
    $currentDateTime = date('Y-m-d H:i:s');
    $stmt->bindValue(':absence_date_declaration', $currentDateTime);
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    $stmt->bindValue(':absence_date_start', $_POST['absence-date-start']);
    $stmt->bindValue(':absence_date_end', $_POST['absence-date-end']);
    $stmt->bindValue(':absence_type_id', $_POST['absence-type-id']);
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

function deleteAbsence($id): void
{
    $db = connectToDatabase();
    $sql = "DELETE FROM table_absence WHERE absence_id = :absence_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':absence_id', $id);
    $stmt->execute();
}
