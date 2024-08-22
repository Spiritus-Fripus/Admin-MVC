<?php
/**
 * @var array|bool $recordset
 * @var int $page
 * @var int $totalPages
 * @var array $filters
 * @var array|bool $recordset
 */

?>
<div class="main-container-center-column">
    <form action="?controller=formation&action=index"
          method="get"
          class="form-search">

        <input type="hidden" name="controller" value="formation">
        <input type="hidden" name="action" value="index">

        <div class="form-searchbar">
            <!-- SEARCHBAR -->
            <label for="search"></label>
            <input type="text" name=search class="search-bar" placeholder="Recherche">
            <!-- END / SEARCHBAR -->
            <button class="submit-button" type="submit">Rechercher</button>
        </div>
        <div class="form-sort">
            <!-- TRI PAR ID/NAME/FIRSTNAME -->
            <select name="sort-by" onchange="submitForm()">
                <option value="formation_id" <?= isset($_GET['sort-by']) && $_GET['sort-by'] == 'formation_id' ? 'selected' : '' ?>>
                    Ajout
                </option>
                <option value="formation_name" <?= isset($_GET['sort-by']) && $_GET['sort-by'] == 'formation_name' ? 'selected' : '' ?>>
                    Nom
                </option>
                <option value="formation_duration" <?= isset($_GET['sort-by']) && $_GET['sort-by'] == 'formation_duration' ? 'selected' : '' ?>>
                    Durée
                </option>
            </select>
            <!-- END / TRI PAR ID/NAME/FIRSTNAME-->

            <!-- ORDER BY  -->
            <select name="sort-direction" onchange="submitForm()">
                <option value="ASC" <?= isset($_GET['sort-direction']) && $_GET['sort-direction'] == 'ASC' ? 'selected' : '' ?>>
                    ASC
                </option>
                <option value="DESC" <?= isset($_GET['sort-direction']) && $_GET['sort-direction'] == 'DESC' ? 'selected' : '' ?>>
                    DESC
                </option>
            </select>
            <!-- END / ORDER BY  -->

        </div>
    </form>
    <div class="user-link">
        <a href="?controller=formation&action=addFormation" class="link">Ajouter une formation</a>
        <a href="?controller=formation-archive&action=index" class="link">Archives</a>
    </div>
    <table class="table-container">
        <thead>
        <tr>
            <th>Nom de la formation</th>
            <th>Durée</th>
            <th>Qualification</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recordset as $formation) { ?>
            <tr class="card-tr">
                <input type="hidden" name="formation_id"
                       value="<?= htmlspecialchars($formation['formation_id']) ?>"/>
                <td data-label="Nom de la formation"><?= htmlspecialchars($formation['formation_name']) ?></td>
                <td data-label="Durée"><?= htmlspecialchars($formation['formation_duration']) ?></td>
                <td data-label="Qualification"><?= "Bac+" . htmlspecialchars($formation['formation_qualification']) ?></td>
                <td data-label="Actions">
                    <div class="button-crud">
                        <a href="?controller=formation&action=archiveFormation&formation_id=<?= $formation['formation_id'] ?>"
                           class="delete">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                 width="20px" fill="#93291e">
                                <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-12q-15.3 0-25.65-10.29Q192-716.58 192-731.79t10.35-25.71Q212.7-768 228-768h156v-12q0-15.3 10.35-25.65Q404.7-816 420-816h120q15.3 0 25.65 10.35Q576-795.3 576-780v12h156q15.3 0 25.65 10.29Q768-747.42 768-732.21t-10.35 25.71Q747.3-696 732-696h-12v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM419.79-288q15.21 0 25.71-10.35T456-324v-264q0-15.3-10.29-25.65Q435.42-624 420.21-624t-25.71 10.35Q384-603.3 384-588v264q0 15.3 10.29 25.65Q404.58-288 419.79-288Zm120 0q15.21 0 25.71-10.35T576-324v-264q0-15.3-10.29-25.65Q555.42-624 540.21-624t-25.71 10.35Q504-603.3 504-588v264q0 15.3 10.29 25.65Q524.58-288 539.79-288ZM312-696v480-480Z"/>
                            </svg>
                        </a>
                        <a href="?controller=formation&action=modifyFormation&formation_id=<?= $formation['formation_id'] ?>"
                           class="modify">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                 width="20px"
                                 fill="#283e58">
                                <path d="M216-216h51l375-375-51-51-375 375v51Zm-35.82 72q-15.18 0-25.68-10.3-10.5-10.29-10.5-25.52v-86.85q0-14.33 5-27.33 5-13 16-24l477-477q11-11 23.84-16 12.83-5 27-5 14.16 0 27.16 5t24 16l51 51q11 11 16 24t5 26.54q0 14.45-5.02 27.54T795-642L318-165q-11 11-23.95 16t-27.24 5h-86.63ZM744-693l-51-51 51 51Zm-127.95 76.95L591-642l51 51-25.95-25.05Z"/>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="paging">
        <?php if ($page > 1): ?>
            <a href="?controller=formation&action=index&page=<?= $page - 1 ?>&search=<?= urlencode($filters['search']) ?>&sort-by=<?= urlencode($filters['orderBy']) ?>&sort-direction=<?= urlencode($filters['direction']) ?>">Précédent</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?controller=formation&action=index&page=<?= $i ?>&search=<?= urlencode($filters['search']) ?>&sort-by=<?= urlencode($filters['orderBy']) ?>&sort-direction=<?= urlencode($filters['direction']) ?>" <?= $i == $page ? 'class="active"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?controller=formation&action=index&page=<?= $page + 1 ?>&search=<?= urlencode($filters['search']) ?>&sort-by=<?= urlencode($filters['orderBy']) ?>&sort-direction=<?= urlencode($filters['direction']) ?>">Suivant</a>
        <?php endif; ?>
    </div>
</div>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Êtes-vous sûr de vouloir supprimer cette formation ?</p>
        <button id="confirmDelete">Oui</button>
        <button id="cancelDelete">Non</button>
    </div>
</div>
