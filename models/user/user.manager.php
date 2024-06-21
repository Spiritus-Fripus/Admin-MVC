<?php

require_once '../config/connect.php';

function showAllUser(): bool|array
{
    $db = connectToDatabase();
    // Ajout d'un alias pour calculer l'age de l'utilisateur avec TIMESTAMPDIFF()
    $sql = "SELECT *, TIMESTAMPDIFF(YEAR, user_birthday_date, CURDATE()) AS age
            FROM table_user ORDER BY user_id ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserById($user_id)
{
    $db = connectToDatabase();
    $sql = 'SELECT *, TIMESTAMPDIFF(YEAR, user_birthday_date, CURDATE()) AS age  
            FROM table_user 
            WHERE user_id = :user_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function generatePassword($length = 12): string
{
    return bin2hex(random_bytes($length / 2));
}

function addUser(): void
{
    $tempPassword = generatePassword();
    $hashedPassword = password_hash($tempPassword, PASSWORD_DEFAULT);

    $db = connectToDatabase();
    $sql = "INSERT INTO table_user (user_name, user_firstname, user_mail, user_phonenumber, user_birthday_date, user_gender, user_type_id, user_password, created_at, created_by) VALUES (:user_name,:user_firstname,:user_mail,:user_phonenumber,:user_birthday_date,:user_gender,:user_type_id,:user_password,NOW(),:created_by) ";
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

function updateUser(): void
{
    $db = connectToDatabase();

    $sql = "UPDATE table_user 
            SET 
                user_name = :user_name, 
                user_firstname = :user_firstname, 
                user_mail = :user_mail, 
                user_phonenumber = :user_phonenumber,
                user_birthday_date = :user_birthday_date,
                user_gender = :user_gender,
                user_type_id = :user_type_id
            WHERE user_id = :user_id";

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
function archiveUser($user_id): void
{
    $db = connectToDatabase();

    try {
        // Commence la transaction
        $db->beginTransaction();

        // Sélectionner les données de l'utilisateur a partir de getUserById()
        $userData = getUserById($user_id);

        if ($userData) {
            // Insertion des données dans la table d'archive
            $sql_insert = "INSERT INTO table_user_archive (user_archive_name, user_archive_firstname, user_archive_mail, user_archive_gender, user_archive_phonenumber, user_archive_type_id, user_archive_old_id,archived_at,archived_by) 
                VALUES (:user_name, :user_firstname, :user_mail, :user_gender, :user_phonenumber, :user_archive_type_id, :user_archive_old_id, NOW(), :archived_by)";
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
            $sql_delete = "DELETE FROM table_user WHERE user_id = :user_id";
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


function searchAndFilter($search, $type = 'ALL', $orderBy = 'user_id', $direction = 'DESC'): bool|array
{
    $db = connectToDatabase();
    $where = [];
    $params = [];

    // WHERE pour filtrer par type
    if ($type !== 'ALL') {
        $where[] = "user_type_id = :type";
        $params[':type'] = (int)$type;
    }

    // WHERE pour la recherche
    if (!empty($search)) {
        $where[] = "CONCAT(user_firstname, ' ', user_name, ' ', user_mail) LIKE :search";
        $params[':search'] = '%' . $search . '%';
    }

    // Construction de la clause WHERE
    $whereClause = '';
    if (!empty($where)) {
        $whereClause = 'WHERE ' . implode(' AND ', $where);
    }

    // Ordre de tri
    $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';

    $sql = "SELECT *, TIMESTAMPDIFF(YEAR, user_birthday_date, CURDATE()) AS age
            FROM table_user
            $whereClause
            ORDER BY $orderBy $direction";

    $stmt = $db->prepare($sql);

    // Binding des valeurs
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
