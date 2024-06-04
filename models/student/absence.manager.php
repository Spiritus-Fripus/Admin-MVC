<?php

function getAllAbsence()
{
    require '../config/connect.php';
    $sql = "SELECT * FROM table_absence WHERE user_id = user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
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
