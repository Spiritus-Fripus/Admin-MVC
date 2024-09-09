<div class="main-container-center-column">

    <!-- Barre de recherche -->
    <input type="text" id="searchInput" placeholder="Recherche par nom, prénom ou email" class="search-bar">

    <!-- Tri par nom, prénom ou date -->
    <select id="sortBy" class="sort-by">
        <option value="archived_at">Date</option>
        <option value="user_archive_name">Nom</option>
        <option value="user_archive_firstname">Prénom</option>
    </select>

    <!-- Direction ASC/DESC -->
    <select id="sortDirection" class="sort-direction">
        <option value="ASC">ASC</option>
        <option value="DESC">DESC</option>
    </select>

    <!-- Type d'utilisateur -->
    <select id="sortType" class="sort-type">
        <option value="ALL">Tous</option>
        <option value="1">Admin</option>
        <option value="2">Gestionnaire</option>
        <option value="3">Élève</option>
    </select>

    <!-- Tableau des résultats -->
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
        <tbody id="dataRows">
            <?php foreach ($recordset as $row) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['user_archive_name']) ?></td>
                    <td><?= htmlspecialchars($row['user_archive_firstname']) ?></td>
                    <td><?= htmlspecialchars($row['user_archive_mail']) ?></td>
                    <td><?= htmlspecialchars($row['user_archive_phonenumber']) ?></td>
                    <td><?= htmlspecialchars($row['user_type_name']) ?></td>
                    <td><?= htmlspecialchars($row['archived_at']) ?></td>
                    <td><?= htmlspecialchars($row['archived_by']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>