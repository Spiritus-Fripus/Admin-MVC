<?php
/**
 * @var bool|array $recordset
 */
?>
<div class="index-main-container">
    <div class="index-header">
        <h1>Liste des utilisateurs: </h1>
        <button type="button" class="add">Ajouter un utilisateur</button>
    </div>
    <table class="user-card">
        <tbody>
        <?php foreach ($recordset as $row) { ?>
            <?php switch ($row['user_type_id']) {
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
                <td data-label="Nom"><?= $row['user_name'] ?></td>
                <td data-label="Prénom"><?= $row['user_firstname'] ?></td>
                <td data-label="Mail"><?= $row['user_mail'] ?></td>
                <td data-label="Téléphone"><?= $row['user_phonenumber'] ?></td>
                <td data-label="Date de naissance"><?= $row['user_birthday_date'] ?></td>
                <td data-label="Type"><?= $type_user ?></td>
                <td>
                    <div class="button-crud">
                        <button type="button" class="modify">Modifier</button>
                        <button type="button" class="delete">supprimer</button>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
