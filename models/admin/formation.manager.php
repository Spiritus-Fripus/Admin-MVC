<?php

function getAllFormation()
{
    require '../config/connect.php';
    $sql = 'SELECT * FROM table_formation';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function createFormation()
{

    require '../config/connect.php';
    //require '../admin/include/verify.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
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
            echo "Formation ajoutée avec succès !";
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la formation : " . $e->getMessage();
        }
    }
}
