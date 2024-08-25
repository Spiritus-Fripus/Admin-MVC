<?php

/**
 *  PHP DOC
 * @var string $title
 * @var array|bool $recordset
 */
?>

<div class="main-container-center-column">
    <h2><?= $title ?></h2>

    <?php if ($_SESSION['user_type'] == 'student'): ?>
        <a href="/addAbsence">Déclarer une absence</a>
    <?php endif ?>

    <table class="table-container">

        <thead>
            <?php if ($_SESSION['user_type'] == 'student'): ?>
                <tr>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Date déclaration</th>
                    <th>Statut</th>
                </tr>
            <?php endif ?>

            <?php if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager') : ?>
                <tr>
                    <th>Nom Prénom</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Date déclaration</th>
                    <th>Statut</th>
                </tr>
            <?php endif ?>
        </thead>

        <tbody>

            <?php foreach ($recordset as $row) { ?>

                <?php if ($_SESSION['user_type'] == 'student'): ?>
                    <tr class="card-tr">
                        <td data-label="Début"><?= htmlspecialchars($row['absence_date_start']) ?></td>
                        <td data-label="Fin"><?= htmlspecialchars($row['absence_date_end']) ?></td>
                        <td data-label="Date déclaration"><?= htmlspecialchars($row['absence_date_declaration']) ?></td>
                        <td data-label="Statut"><?= htmlspecialchars($row['absence_status'] == 0 ? 'non vérifié' : 'verifié') ?></td>
                    </tr>
                <?php endif ?>

                <?php if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager') : ?>
                    <tr class="card-tr">

                        <td data-label="Nom Prénom"><?= htmlspecialchars($row['user_name'] . " " . $row['user_firstname'])  ?></td>
                        <td data-label="Début"><?= htmlspecialchars($row['absence_date_start']) ?></td>
                        <td data-label="Fin"><?= htmlspecialchars($row['absence_date_end']) ?></td>
                        <td data-label="Date de déclaration"><?= htmlspecialchars($row['absence_date_declaration']) ?></td>
                        <td data-label="Statut"><?= htmlspecialchars($row['absence_status'] == 0 ? 'non vérifié' : 'verifié') ?></td>
                    </tr>
                <?php endif ?>

            <?php } ?>

        </tbody>
    </table>
</div>