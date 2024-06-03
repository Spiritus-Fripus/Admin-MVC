<?php

function getAllFormation()
{
    require '../config/connect.php';
    $sql = 'SELECT * FROM table_formation';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getFormationById($formation_id)
{
    require '../config/connect.php';
    $sql = 'SELECT * FROM table_formation WHERE formation_id = :formation_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':formation_id', $formation_id);
    $stmt->execute();
    return $stmt->fetch();
}

function createFormation()
{

    require '../config/connect.php';

    $sql = 'INSERT INTO table_formation (formation_type_id, formation_name, formation_duration, formation_date_start, formation_date_end, formation_max_student, formation_qualification) VALUES (:formation_type_id, :formation_name, :formation_duration, :formation_date_start, :formation_date_end, :formation_max_student, :formation_qualification)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':formation_type_id', $_POST['formation_type_id']);
    $stmt->bindValue(':formation_name', $_POST['formation_name']);
    $stmt->bindValue(':formation_duration', $_POST['formation_duration']);
    $stmt->bindValue(':formation_date_start', $_POST['formation_date_start']);
    $stmt->bindValue(':formation_date_end', $_POST['formation_date_end']);
    $stmt->bindValue(':formation_max_student', $_POST['formation_max_student']);
    $stmt->bindValue(':formation_qualification', $_POST['formation_qualification']);
    $stmt->execute();
}

function deleteFormation()
{
    require '../config/connect.php';

    $sql = "DELETE FROM table_formation WHERE formation_id = :formation_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':formation_id', $_POST['formation_id']);
    $stmt->execute();
}

function updateFormation()
{
    require '../config/connect.php';

    $sql = "UPDATE table_formation 
            SET 
                formation_name = :formation_name, 
                formation_qualification = :formation_qualification, 
                formation_date_start = :formation_date_start, 
                formation_date_end = :formation_date_end 
            WHERE formation_id = :formation_id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':formation_id', $_POST['formation_id']);
    $stmt->bindValue(':formation_name', $_POST['formation_name']);
    $stmt->bindValue(':formation_qualification', $_POST['formation_qualification']);
    $stmt->bindValue(':formation_date_start', $_POST['formation_date_start']);
    $stmt->bindValue(':formation_date_end', $_POST['formation_date_end']);
    $stmt->execute();
}
