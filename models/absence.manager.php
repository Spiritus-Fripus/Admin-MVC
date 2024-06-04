<?php

function getAllAbsence()
{
    require '../config/connect.php';
    $sql = "SELECT * FROM table_absence WHERE user_id = user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAbsenceById($absence_id)
{
    require '../config/connect.php';
    $sql = 'SELECT * FROM table_absence WHERE absence_id = :absence_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':absence_id', $absence_id);
    $stmt->execute();
}

function addAbsence()
{
    require '../config/connect.php';
    $sql = "INSERT INTO table_absence 
    (absence_date_start, absence_date_end, absence_date_declaration,absence_type_id) 
    VALUES (:absence_date_start, :absence_date_end, :absence_date_declaration,:absence_type_id) WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

function updateAbsence()
{
    require '../config/connect.php';
    $sql = "UPDATE table_absence 
    SET 
    absence_date_start = :absence_date_start,
    absence_date_end = :absence_date_end,
    absence_date_declaration = :absence_date_declaration,
    absence_type_id = :absence_type_id
    WHERE absence_id = :absence_id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':absence_date_start', $_POST['absence_date_start']);
    $stmt->bindValue(':absence_date_end', $_POST['absence_date_end']);
    $stmt->bindValue(':absence_date_declaration', $_POST['absence_date_declaration']);
    $stmt->bindValue(':absence_type_id', $_POST['absence_type_id']);
    $stmt->execute();
}

function deleteAbsence()
{
    require '../config/connect.php';
    $sql = "DELETE FROM table_absence WHERE absence_id = :absence_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':absence_id', $_POST['absence_id']);
    $stmt->execute();
}
