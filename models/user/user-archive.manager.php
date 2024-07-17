<?php

require_once '../config/connect.php';

function searchAndFilterUsersArchived(string $search, string $type, string $orderBy, string $direction): bool|array
{
    $db = connectToDatabase();
    $where = [];
    $params = [];


    if ($type !== 'ALL') {
        $where[] = "user_archive_type_id = :type";
        $params[':type'] = (int)$type;
    }


    if (!empty($search)) {
        $where[] = "CONCAT(user_archive_firstname, ' ', user_archive_name, ' ', user_archive_mail) LIKE :search";
        $params[':search'] = '%' . $search . '%';
    }


    $whereClause = '';
    if (!empty($where)) {
        $whereClause = 'WHERE ' . implode(' AND ', $where);
    }


    $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';

    $sql = "SELECT *
            FROM table_user_archive
            JOIN table_user_type
            ON table_user_archive.user_archive_type_id = table_user_type.user_type_id
            $whereClause
            ORDER BY $orderBy $direction";

    $stmt = $db->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}