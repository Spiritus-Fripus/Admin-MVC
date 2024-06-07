<?php
/**
 * @var array|bool $recordset
 * @var string $title
 */
?>

<div class="index-main-container">
    <h1> <?= $title ?></h1>
    <table class="table-user">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date de naissance</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recordset as $row) { ?>
            <tr>
                <td><?= $row['user_name'] ?></td>
                <td><?= $row['user_firstname'] ?></td>
                <td><?= $row['user_mail'] ?></td>
                <td><?= $row['user_birthday_date'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>