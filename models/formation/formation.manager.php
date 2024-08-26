<?php

require_once '../config/connect.php';

function getAllFormation(): bool|array
{
    $db = connectToDatabase();
    $sql = 'SELECT formation_name, formation_duration, formation_qualification, formation_id 
            FROM table_formation';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getFormationById($formation_id)
{
    $db = connectToDatabase();
    $sql = 'SELECT * FROM table_formation WHERE formation_id = :formation_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':formation_id', $formation_id);
    $stmt->execute();
    return $stmt->fetch();
}

function addFormation(): void
{

    $db = connectToDatabase();

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
}

function archiveFormation(string $formationId): void
{
    $db = connectToDatabase();

    try {
        // Commence la transaction
        $db->beginTransaction();

        // Sélectionner les données de l'utilisateur a partir de getUserById()
        $formationData = getFormationById($formationId);

        if ($formationData) {
            // Insertion des données dans la table d'archive
            $sql_insert =
                "INSERT INTO table_formation_archive
                    (
                     table_formation_archive.formation_archive_name,
                     table_formation_archive.formation_archive_duration, 
                     table_formation_archive.formation_archive_date_start, 
                     table_formation_archive.formation_archive_date_end, 
                     table_formation_archive.formation_archive_qualification, 
                     table_formation_archive.formation_archive_type_id, 
                     table_formation_archive.formation_archive_old_id,
                     table_formation_archive.archived_at,
                     table_formation_archive.archived_by
                     ) 
                VALUES 
                    (
                     :formation_name,
                     :formation_duration, 
                     :formation_date_start,
                     :formation_date_end, 
                     :formation_qualification,
                     :formation_archive_type_id,
                     :formation_archive_old_id, 
                     NOW(), 
                     :archived_by
                     )";
            $stmt_insert = $db->prepare($sql_insert);
            $stmt_insert->bindValue(':formation_name', $formationData['formation_name'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':formation_duration', $formationData['formation_duration'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':formation_date_start', $formationData['formation_date_start'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':formation_date_end', $formationData['formation_date_end'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':formation_qualification', $formationData['formation_qualification'], PDO::PARAM_STR);
            $stmt_insert->bindValue(':formation_archive_type_id', $formationData['formation_type_id'], PDO::PARAM_INT);
            $stmt_insert->bindValue(':formation_archive_old_id', $formationData['formation_id'], PDO::PARAM_INT);
            $stmt_insert->bindValue(':archived_by', $_SESSION['user_mail'], PDO::PARAM_STR);
            $stmt_insert->execute();

            // Suppression des données de la table user
            $sql_delete = "DELETE FROM table_formation WHERE table_formation.formation_id = :formation_id";
            $stmt_delete = $db->prepare($sql_delete);
            $stmt_delete->bindValue(':formation_id', $formationId, PDO::PARAM_INT);
            $stmt_delete->execute();
        }

        // Commit la transaction
        $db->commit();
    } catch (PDOException $e) {
        // Annule la transaction en cas d'erreur
        $db->rollBack();

        // Envoie l'erreur
        throw new Exception("Erreur lors de l'archivage de la formation : " . $e->getMessage());
    }
}

function updateFormation(): void
{
    $db = connectToDatabase();

    $sql = "UPDATE table_formation 
            SET 
                formation_name = :formation_name, 
                formation_qualification = :formation_qualification, 
                formation_date_start = :formation_date_start, 
                formation_date_end = :formation_date_end,
                formation_duration = :formation_duration,
                formation_type_id = :formation_type_id
            WHERE formation_id = :formation_id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':formation_id', $_POST['formation_id']);
    $stmt->bindValue(':formation_name', $_POST['formation_name']);
    $stmt->bindValue(':formation_qualification', $_POST['formation_qualification']);
    $stmt->bindValue(':formation_date_start', $_POST['formation_date_start']);
    $stmt->bindValue(':formation_date_end', $_POST['formation_date_end']);
    $stmt->bindValue(':formation_duration', $_POST['formation_duration']);
    $stmt->bindValue(':formation_type_id', $_POST['formation_type_id']);
    $stmt->execute();
}

function whereClause(array &$params, string $search, ): string
{
    $where = [];

    if (!empty($search)) {
        $where[] = "CONCAT(table_formation.formation_id, ' ', table_formation.formation_name, ' ', table_formation.formation_duration) LIKE :search";
        $params[':search'] = '%' . $search . '%';
    }

    return !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
}

function searchAndFilterFormation(
    string $search,
    string $orderBy,
    string $direction,
    int    $offset,
    int    $limit
): array
{
    $db = connectToDatabase();
    $params = [];

    $whereClause = whereClause($params, $search, );

    $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';

    $sql = "SELECT *
            FROM table_formation
            JOIN table_formation_type
            ON table_formation.formation_type_id = table_formation_type.formation_type_id
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

function getTotalFormationCount(string $search): int
{
    $db = connectToDatabase();
    $params = [];

    $whereClause = whereClause($params, $search);

    $sql = "SELECT COUNT(*) AS total
            FROM table_formation
            JOIN table_formation_type
            ON table_formation.formation_type_id = table_formation_type.formation_type_id
            $whereClause";

    $stmt = $db->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    $stmt->execute();
    return (int)$stmt->fetchColumn();
}