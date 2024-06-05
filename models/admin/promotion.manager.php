<?php

function getAllPromotion()
{
    require '../config/connect.php';
    $sql = 'SELECT * FROM table_promotion';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function createPromotion()
{

    require '../config/connect.php';

    $sql = 'INSERT INTO table_promotion (promotion_name, promotion_year, formation_id) VALUES (:promotion_name, :promotion_year, formation_id)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':promotion_name', $_POST['promotion_name']);
    $stmt->bindValue(':promotion_year', $_POST['promotion_year']);
    $stmt->bindValue(':formation_id', $_POST['formation_id']);
    $stmt->execute();
}
