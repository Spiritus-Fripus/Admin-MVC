<table class="table-container">

    <thead>
        <tr>
            <th>Formation</th>
            <th>Qualification</th>
            <th>Durée</th>
            <th>Date archive</th>
            <th>Archivé par</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($recordset as $row) { ?>

            <tr class="card-tr">
                <input type="hidden" name="user_archive_id" value="<?= htmlspecialchars($row['formation_archive_id']) ?>" />
                <td data-label="Nom de la formation"><?= htmlspecialchars($row['formation_archive_name']) ?></td>
                <td data-label="Qualification de la formation"><?= htmlspecialchars($row['formation_archive_qualification']) ?></td>
                <td data-label="Durée de la formation"><?= htmlspecialchars($row['formation_archive_duration']) ?></td>
                <td data-label="Date archive"><?= htmlspecialchars($row['archived_at']) ?></td>
                <td data-label="Archivé par"><?= htmlspecialchars($row['archived_by']) ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>
<!-- Pagination -->
<div class="paging">
    <?php /** PHP DOC : @var int $page */ ?>
    <?php if ($page > 1): ?>
        <a href="/formationArchive?page=<?= $page - 1 ?>">Précédent</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="/formationArchive?page=<?= $i ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="/formationArchive?page=<?= $page + 1 ?>">Suivant</a>
    <?php endif; ?>
</div>

</div>