<?php
/**
 * @var bool|array $recordset
 */

?>
<div class="index-main-container">
    <div class="index-header">
        <form action="?controller=user&action=index" method="post">
            <label for="search"></label>
            <input type="text" name=search class="search-bar" placeholder="Recherche">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <input type="hidden" value="Envoyer">
        </form>
        <a href="?controller=user&action=addUser" class="add">Ajouter un utilisateur</a>
    </div>
    <table class="user-card">
        <tbody>
        <?php foreach ($recordset as $row) { ?>

            <?php
            // Mise à jour de la date en version FR
            try {
                $date = new DateTime($row['user_birthday_date']);
                $formattedDate = $date->format('d-m-Y');
            } catch (Exception $e) {
                error_log('Erreur lors de la création de l\'objet DateTime : ' . $e->getMessage());
                $formattedDate = 'Date invalide'; // Valeur par défaut en cas d'erreur
            } ?>

            <?php
            // switch sur les types
            switch ($row['user_type_id']) {
                case 1:
                    $type_user = 'Admin';
                    break;
                case 2:
                    $type_user = 'Gestionnaire';
                    break;
                case 3:
                    $type_user = 'Élève';
                    break;
            } ?>
            <tr>
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($row['user_id']) ?>"/>
                <td data-label="Nom"><?= htmlspecialchars($row['user_name']) ?></td>
                <td data-label="Prénom"><?= htmlspecialchars($row['user_firstname']) ?></td>
                <td data-label="Mail"><?= htmlspecialchars($row['user_mail']) ?></td>
                <td data-label="Téléphone"><?= htmlspecialchars($row['user_phonenumber']) ?></td>
                <td data-label="Date de naissance"><?= htmlspecialchars($formattedDate) ?></td>
                <td data-label="Age"><?= htmlspecialchars($row['age']) ?></td>
                <td data-label="Genre"><?= htmlspecialchars($row['user_gender']) ?></td>
                <td data-label="Type"><?= htmlspecialchars($type_user) ?></td>
                <td>
                    <div class="button-crud">
                        <a href="?controller=user&action=updateUser&user_id=<?= $row['user_id'] ?>" class="modify">Modifier</a>
                        <?php if ($row['user_mail'] !== $_SESSION['user_mail']) { ?>
                            <a href="?controller=user&action=archiveUser&user_id=<?= $row['user_id'] ?>" class="delete">supprimer</a>
                        <?php } ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>