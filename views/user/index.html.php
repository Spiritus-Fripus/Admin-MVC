<?php
/**
 * @var bool|array $recordset
 */
?>

<table class="user-card">
    <caption>Liste des utilisateurs</caption>
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
        </tr>
    <?php } ?>
    </tbody>
</table>
