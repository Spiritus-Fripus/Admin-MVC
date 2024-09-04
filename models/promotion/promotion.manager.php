<?php

require_once "../config/connect.php";

function getAllPromotion(): array
{
	$db = connectToDatabase();
	$sql = 'SELECT * FROM table_promotion';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function getAllFormationType(): array
{
	$db = connectToDatabase();
	$sql = 'SELECT * FROM table_formation_type';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function getFormationOfPromotion(): array
{
	$db = connectToDatabase();
	$sql = 'SELECT table_promotion.promotion_id, table_formation.formation_name 
			FROM table_formation 
			INNER JOIN table_promotion 
			ON table_formation.formation_id = table_promotion.formation_id';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$formationPromotion = [];
	foreach ($results as $result) {
		$formationPromotion[$result['promotion_id']] = $result['formation_name'];
	}

	return $formationPromotion;
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

function getPromotionById($formation_id)
{
	$db = connectToDatabase();
	$sql = 'SELECT * FROM table_formation WHERE formation_id = :formation_id';
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':formation_id', $formation_id);
	$stmt->execute();
	return $stmt->fetch();
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
		formation_id = :formation_id,
	WHERE promotion_id = :promotion_id";

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':promotion_id', $_POST['promotion_id']);
	$stmt->bindValue(':promotion_name', $_POST['promotion_name']);
	$stmt->bindValue(':formation_id', $_POST['formation_id']);
	$stmt->execute();
}
