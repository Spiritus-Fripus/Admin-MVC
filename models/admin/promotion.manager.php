<?php

require_once "../config/connect.php";

function getAllPromotion(): array
{
    $db = connectToDatabase();
    $sql = 'SELECT p.*, f.formation_name FROM table_promotion p INNER JOIN table_formation f ON p.formation_id = f.formation_id';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllFormationType(): array
{
    $db = connectToDatabase();
    $sql = 'SELECT * FROM table_formation_type';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFormationOfPromotion($promotion_id)
{
    $db = connectToDatabase();
    $sql = 'SELECT formation_name FROM table_formation INNER JOIN table_promotion ON table_formation.formation_id = table_promotion.formation_id WHERE table_promotion.promotion_id = :promotion_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':promotion_id', $promotion_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
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

function getPromotionById($promotion_id)
{
    $db = connectToDatabase();
    $sql = 'SELECT * FROM table_promotion WHERE promotion_id = :promotion_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':promotion_id', $promotion_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deletePromotion(): void
{
    $db = connectToDatabase();
    $sql = "DELETE FROM table_promotion WHERE promotion_id = :promotion_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':promotion_id', $_POST['promotion_id']);
    $stmt->execute();
}

function updatePromotion(): void
{
    $db = connectToDatabase();
    $sql = "UPDATE table_promotion 
    SET 
        promotion_name = :promotion_name,
        promotion_year = :promotion_year,
        formation_id = :formation_id
    WHERE promotion_id = :promotion_id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':promotion_id', $_POST['promotion_id']);
    $stmt->bindValue(':promotion_name', $_POST['promotion_name']);
    $stmt->bindValue(':promotion_year', $_POST['promotion_year']);
    $stmt->bindValue(':formation_id', $_POST['promotion_formation_id']);
    $stmt->execute();
}
