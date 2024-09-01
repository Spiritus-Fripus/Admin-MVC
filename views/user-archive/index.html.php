<div class="main-container-center-column">

    <form action="/userArchive" method="get" class="form-search">

        <div class="form-searchbar">
            <!-- SEARCHBAR -->
            <label for="search"></label>
            <input type="text" name=search class="search-bar" placeholder="Recherche">
            <button class="submit-button" type="submit">Recherche</button>
            <!-- END / SEARCHBAR -->
        </div>

        <div class="form-sort ">
            <!-- TRI PAR ID/NAME/FIRSTNAME -->
            <select name="sort-by" id="" onchange="submitForm()">
                <option value=" archived_at" <?= isset($_GET['sort-by']) && $_GET['sort-by'] == 'archived_at' ? 'selected' : '' ?>>
                    Date
                </option>
                <option value="user_archive_name" <?= isset($_GET['sort-by']) && $_GET['sort-by'] == 'user_archive_name' ? 'selected' : '' ?>>
                    Nom
                </option>
                <option value="user_archive_firstname" <?= isset($_GET['sort-by']) && $_GET['sort-by'] == 'user_archive_firstname' ? 'selected' : '' ?>>
                    Prénom
                </option>
            </select>
            <!-- END / TRI PAR ID/NAME/FIRSTNAME-->


            <!-- ORDER BY  -->
            <select name="sort-direction" id="" onchange="submitForm()">
                <option value="ASC" <?= isset($_GET['sort-direction']) && $_GET['sort-direction'] == 'ASC' ? 'selected' : '' ?>>
                    ASC
                </option>
                <option value="DESC" <?= isset($_GET['sort-direction']) && $_GET['sort-direction'] == 'DESC' ? 'selected' : '' ?>>
                    DESC
                </option>
            </select>

            <!-- END / ORDER BY  -->


            <!-- TRI PAR TYPE -->
            <select name="sort-type" id="" onchange="submitForm()">
                <option value="ALL" <?= isset($_GET['sort-type']) && $_GET['sort-type'] == 'ALL' ? 'selected' : '' ?>>
                    Tous
                </option>
                <option value="1" <?= isset($_GET['sort-type']) && $_GET['sort-type'] == '1' ? 'selected' : '' ?>>
                    Admin
                </option>
                <option value="2" <?= isset($_GET['sort-type']) && $_GET['sort-type'] == '2' ? 'selected' : '' ?>>
                    Gestionnaire
                </option>
                <option value="3" <?= isset($_GET['sort-type']) && $_GET['sort-type'] == '3' ? 'selected' : '' ?>>
                    Élève
                </option>
            </select>
            <!-- END / TRI PAR TYPE -->
        </div>


    </form>


    <table class="table-container">

        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Tel</th>
                <th>Type</th>
                <th>Date archive</th>
                <th>Archivé par</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($recordset as $row) { ?>

                <tr class="card-tr">
                    <input type="hidden" name="user_archive_id" value="<?= htmlspecialchars($row['user_archive_id']) ?>" />
                    <td data-label="Nom"><?= htmlspecialchars($row['user_archive_name']) ?></td>
                    <td data-label="Prénom"><?= htmlspecialchars($row['user_archive_firstname']) ?></td>
                    <td data-label="Mail"><?= htmlspecialchars($row['user_archive_mail']) ?></td>
                    <td data-label="Tel"><?= htmlspecialchars($row['user_archive_phonenumber']) ?></td>
                    <td data-label="type"><?= htmlspecialchars($row['user_type_name']) ?></td>
                    <td data-label="Date archive"><?= htmlspecialchars($row['archived_at']) ?></td>
                    <td data-label="Archivé par"><?= htmlspecialchars($row['archived_by']) ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="paging">
        <?php if ($page > 1): ?>
            <a href="/userArchive?page=<?= $page - 1 ?>&search=<?= urlencode($filters['search']) ?>&sort-by=<?= urlencode($filters['orderBy']) ?>&sort-direction=<?= urlencode($filters['direction']) ?>&sort-type=<?= urlencode($filters['type']) ?>">Précédent</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="/userArchive?page=<?= $i ?>&search=<?= urlencode($filters['search']) ?>&sort-by=<?= urlencode($filters['orderBy']) ?>&sort-direction=<?= urlencode($filters['direction']) ?>&sort-type=<?= urlencode($filters['type']) ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="/userArchive?page=<?= $page + 1 ?>&search=<?= urlencode($filters['search']) ?>&sort-by=<?= urlencode($filters['orderBy']) ?>&sort-direction=<?= urlencode($filters['direction']) ?>&sort-type=<?= urlencode($filters['type']) ?>">Suivant</a>
        <?php endif; ?>
    </div>

</div>