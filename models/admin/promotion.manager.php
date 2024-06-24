<?php

require_once "../config/connect.php";

function getAllPromotion(): bool|array
{
    $db = connectToDatabase();
    $sql = 'SELECT * FROM table_promotion';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllFormationType(): bool|array
{
    $db = connectToDatabase();
    $sql = 'SELECT * FROM table_formation_type';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function createPromotion(): void
{
    $db = connectToDatabase();
    $sql = 'INSERT INTO table_promotion (promotion_name, promotion_year, formation_id) VALUES (:promotion_name, :promotion_year, :formation_id)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':promotion_name', $_POST['promotion_name']);
    $stmt->bindValue(':promotion_year', $_POST['promotion_year']);
    $stmt->bindValue(':formation_id', $_POST['promotion_formation_id']);
    $stmt->execute();
}

function deletePromotion(): void
{
    $db = connectToDatabase();
    $sql = "DELETE FROM table_promotion WHERE promotion_id = :promotion_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':promotion_id', $_POST['promotion_id']);
    $stmt->execute();
}
