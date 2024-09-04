<?php

require_once '../config/connect.php';

function searchAndFilterUsersArchived(
	string $search,
	string $type,
	string $orderBy,
	string $direction,
	int    $offset,
	int    $limit
): bool|array {
	$db = connectToDatabase();
	$params = [];

	$whereClause = whereClause($params, $search, $type);
	$direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';


	$sql = "SELECT *
			FROM table_user_archive
			JOIN table_user_type
			ON table_user_archive.user_archive_type_id = table_user_type.user_type_id
			$whereClause
			ORDER BY $orderBy $direction
			LIMIT :offset, :limit";

	$stmt = $db->prepare($sql);

	foreach ($params as $key => $value) {
		$stmt->bindValue($key, $value, PDO::PARAM_STR);
	}

	$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
	$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function whereClause(array &$params, string $search, string $type): string
{
	$where = [];

	if ($type !== 'ALL') {
		$where[] = "table_user_archive.user_archive_type_id = :type";
		$params[':type'] = (int)$type;
	}

	if (!empty($search)) {
		$where[] = "CONCAT(table_user_archive.user_archive_firstname, ' ', table_user_archive.user_archive_name, ' ', table_user_archive.user_archive_mail) LIKE :search";
		$params[':search'] = '%' . $search . '%';
	}

	return !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
}

function getTotalUserArchivedCount(string $search, string $type)
{
	$db = connectToDatabase();
	$params = [];

	$whereClause = whereClause($params, $search, $type);

	$sql = "SELECT COUNT(*) AS total
			FROM table_user_archive
			JOIN table_user_type
			ON table_user_archive.user_archive_type_id = table_user_type.user_type_id
			$whereClause";

	$stmt = $db->prepare($sql);

	foreach ($params as $key => $value) {
		$stmt->bindValue($key, $value, PDO::PARAM_STR);
	}

	$stmt->execute();
	return (int)$stmt->fetchColumn();
}
