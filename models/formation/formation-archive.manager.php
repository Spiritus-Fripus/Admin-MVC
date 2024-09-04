<?php

require_once '../config/connect.php';

function getAllFormationArchived(
	int    $offset,
	int    $limit
) {
	$db = connectToDatabase();

	$sql = "SELECT *
			FROM table_formation_archive
			JOIN table_formation_type
			LIMIT :offset, :limit";

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
	$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTotalFormationCount()
{
	$db = connectToDatabase();

	$sql = "SELECT COUNT(*) AS total
			FROM table_user_archive";

	$stmt = $db->prepare($sql);

	$stmt->execute();
	return (int)$stmt->fetchColumn();
}
