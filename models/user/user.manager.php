<?php

require_once '../config/connect.php';


function getUserById(string $user_id)
{
    $db = connectToDatabase();
    $sql = 'SELECT *, TIMESTAMPDIFF(YEAR, table_user.user_birthday_date, CURDATE()) AS age  
            FROM table_user 
            JOIN table_user_type
            ON table_user.user_type_id = table_user_type.user_type_id
            WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addUser(): void
{
    $tempPassword = generatePassword();
    $hashedPassword = password_hash($tempPassword, PASSWORD_DEFAULT);

    $db = connectToDatabase();
    $sql = "INSERT INTO table_user 
        (
         table_user.user_name,
         table_user.user_firstname,
         table_user.user_mail,
         table_user.user_phonenumber, 
         table_user.user_birthday_date, 
         table_user.user_gender,
         table_user.user_type_id, 
         table_user.user_password, 
         table_user.created_at, 
         table_user.created_by
         ) 
    VALUES 
        (
         :user_name,
         :user_firstname,
         :user_mail,
         :user_phonenumber,
         :user_birthday_date,
         :user_gender,
         :user_type_id,
         :user_password,
         NOW(),:created_by
         ) ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":user_name", $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(":user_firstname", $_POST['firstname'], PDO::PARAM_STR);
    $stmt->bindValue(":user_mail", $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindValue(":user_phonenumber", $_POST['phoneNumber'], PDO::PARAM_STR);
    $stmt->bindValue(":user_gender", $_POST['gender'], PDO::PARAM_STR);
    $stmt->bindValue(":user_birthday_date", $_POST['birthday'], PDO::PARAM_STR);
    $stmt->bindValue(":user_type_id", $_POST['type_id'], PDO::PARAM_INT);
    $stmt->bindValue(":user_password", $hashedPassword, PDO::PARAM_STR);
    $stmt->bindValue(":created_by", $_SESSION['user_mail'], PDO::PARAM_STR);
    $stmt->execute();
}

function generatePassword($length = 12): string
{
    return bin2hex(random_bytes($length / 2));
}

function updateUser(): void
{
    $db = connectToDatabase();

    $sql = "UPDATE table_user 
            SET 
                table_user.user_name = :user_name, 
                table_user.user_firstname = :user_firstname, 
                table_user.user_mail = :user_mail, 
                table_user.user_phonenumber = :user_phonenumber,
                table_user.user_birthday_date = :user_birthday_date,
                table_user.user_gender = :user_gender,
                table_user.user_type_id = :user_type_id
            WHERE table_user.user_id = :user_id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':user_firstname', $_POST['firstname'], PDO::PARAM_STR);
    $stmt->bindValue(':user_mail', $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindValue(':user_phonenumber', $_POST['phone'], PDO::PARAM_STR);
    $stmt->bindValue(':user_birthday_date', $_POST['birthday'], PDO::PARAM_STR);
    $stmt->bindValue(':user_gender', $_POST['gender'], PDO::PARAM_STR);
    $stmt->bindValue(':user_type_id', $_POST['user_type_id'], PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $_POST['user_id'], PDO::PARAM_INT);
    $stmt->execute();
}

/**
 * @throws Exception
 */
function archiveUser(string $user_id): void
{
    $db = connectToDatabase();

    try {
        // Commence la transaction
        $db->beginTransaction();

        // Sélectionner les données de l'utilisateur a partir de getUserById()
        $userData = getUserById($user_id);

        if ($userData) {
            // Insertion des données dans la table d'archive
            $sql_insert =
                "INSERT INTO table_user_archive 
                    (
                     table_user_archive.user_archive_name,
                     table_user_archive.user_archive_firstname, 
                     table_user_archive.user_archive_mail, 
                     table_user_archive.user_archive_gender, 
                     table_user_archive.user_archive_phonenumber, 
                     table_user_archive.user_archive_type_id, table_user_archive.user_archive_old_id,
                     table_user_archive.archived_at,
                     table_user_archive.archived_by
                     ) 
                VALUES 
                    (
                     :user_name,
                     :user_firstname, 
                     :user_mail,
                     :user_gender, 
                     :user_phonenumber,
                     :user_archive_type_id,
                     :user_archive_old_id, 
                     NOW(), :archived_by
                     )";
            $stmt_insert = $db->prepare($sql_insert);
            $stmt_insert->bindValue(':user_name', $userData['user_name'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':user_firstname', $userData['user_firstname'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':user_mail', $userData['user_mail'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':user_gender', $userData['user_gender'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':user_phonenumber', $userData['user_phonenumber'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':user_archive_type_id', $userData['user_type_id'], PDO::PARAM_INT);
            $stmt_insert->bindValue(':user_archive_old_id', $userData['user_id'], PDO::PARAM_INT);
            $stmt_insert->bindValue(':archived_by', $_SESSION['user_mail'], PDO::PARAM_STR);
            $stmt_insert->execute();

            // Suppression des données de la table user
            $sql_delete = "DELETE FROM table_user WHERE table_user.user_id = :user_id";
            $stmt_delete = $db->prepare($sql_delete);
            $stmt_delete->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt_delete->execute();
        }

        // Commit la transaction
        $db->commit();
    } catch (PDOException $e) {
        // Annule la transaction en cas d'erreur
        $db->rollBack();

        // Envoie l'erreur
        throw new Exception("Erreur lors de l'archivage de l'utilisateur : " . $e->getMessage());
    }
}


function whereClause(array &$params, string $search, string $type): string
{
    $where = [];

    if ($type !== 'ALL') {
        $where[] = "table_user.user_type_id = :type";
        $params[':type'] = (int)$type;
    }

    if (!empty($search)) {
        $where[] = "CONCAT(table_user.user_firstname, ' ', table_user.user_name, ' ', table_user.user_mail) LIKE :search";
        $params[':search'] = '%' . $search . '%';
    }

    return !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
}

function searchAndFilterUsers(
    string $search,
    string $type,
    string $orderBy,
    string $direction,
    int    $offset,
    int    $limit
): array {
    $db = connectToDatabase();
    $params = [];

    $whereClause = whereClause($params, $search, $type);

    $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';

    $sql = "SELECT *, TIMESTAMPDIFF(YEAR, user_birthday_date, CURDATE()) AS age
            FROM table_user
            JOIN table_user_type
            ON table_user.user_type_id = table_user_type.user_type_id
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

function getTotalUserCount(string $search, string $type): int
{
    $db = connectToDatabase();
    $params = [];

    $whereClause = whereClause($params, $search, $type);

    $sql = "SELECT COUNT(*) AS total
            FROM table_user
            JOIN table_user_type
            ON table_user.user_type_id = table_user_type.user_type_id
            $whereClause";

    $stmt = $db->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    $stmt->execute();
    return (int)$stmt->fetchColumn();
}
