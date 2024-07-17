<?php
/**
 * @var string $title
 * @var array|bool $recordset
 */
?>
<div class="main-container-center-column">
    <h1><?= $title ?></h1>

    <table class="table-container">

        <thead>
        <tr>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Date déclaration</th>
            <th>Statut</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($recordset as $row) { ?>

            <tr class="card-tr">
                <td data-label="Nom"><?= htmlspecialchars($row['absence_date_start']) ?></td>
                <td data-label="Prénom"><?= htmlspecialchars($row['absence_date_end']) ?></td>
                <td data-label="Mail"><?= htmlspecialchars($row['absence_date_declaration']) ?></td>
                <td data-label="Tel"><?= htmlspecialchars($row['absence_status'] == 0 ? 'non vérifié' : 'verifié') ?></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
</div>
