<div class="main-container-center-column">
    <?php /** PHP DOC @var string $tile */ ?>
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
                    <th>Actions</th>
                </tr>
            <?php endif ?>

            <?php if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager') : ?>
                <tr>
                    <th>Nom Prénom</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Date déclaration</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            <?php endif ?>
        </thead>

        <tbody>
            <?php /** PHP DOC @var array|bool $recordset */ ?>
            <?php foreach ($recordset as $row) : ?>

                <?php if ($_SESSION['user_type'] == 'student'): ?>
                    <tr class="card-tr">
                        <td data-label="Début"><?= htmlspecialchars($row['absence_date_start']) ?></td>
                        <td data-label="Fin"><?= htmlspecialchars($row['absence_date_end']) ?></td>
                        <td data-label="Date déclaration"><?= htmlspecialchars($row['absence_date_declaration']) ?></td>
                        <td data-label="Statut"><?= htmlspecialchars($row['absence_status'] == 0 ? 'non vérifié' : 'verifié') ?></td>
                        <td data-label="Actions">
                            <div class="button-crud">
                                <a
                                    href="/modifyAbsence?absence_id=<?= $row['absence_id'] ?>"
                                    class="modify">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px"
                                        fill="#283e58">
                                        <path d="M216-216h51l375-375-51-51-375 375v51Zm-35.82 72q-15.18 0-25.68-10.3-10.5-10.29-10.5-25.52v-86.85q0-14.33 5-27.33 5-13 16-24l477-477q11-11 23.84-16 12.83-5 27-5 14.16 0 27.16 5t24 16l51 51q11 11 16 24t5 26.54q0 14.45-5.02 27.54T795-642L318-165q-11 11-23.95 16t-27.24 5h-86.63ZM744-693l-51-51 51 51Zm-127.95 76.95L591-642l51 51-25.95-25.05Z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endif ?>

                <?php if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager') : ?>
                    <tr class="card-tr">

                        <td data-label="Nom Prénom"><?= htmlspecialchars($row['user_name'] . " " . $row['user_firstname'])  ?></td>
                        <td data-label="Début"><?= htmlspecialchars($row['absence_date_start']) ?></td>
                        <td data-label="Fin"><?= htmlspecialchars($row['absence_date_end']) ?></td>
                        <td data-label="Date de déclaration"><?= htmlspecialchars($row['absence_date_declaration']) ?></td>
                        <td data-label="Statut"><?= htmlspecialchars($row['absence_status'] == 0 ? 'non vérifié' : 'verifié') ?></td>
                        <td data-label="Actions">
                            <div class="button-crud">
                                <a
                                    href="/modifyAbsence?absence_id=<?= $row['absence_id'] ?>"
                                    class="modify">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px"
                                        fill="#283e58">
                                        <path d="M216-216h51l375-375-51-51-375 375v51Zm-35.82 72q-15.18 0-25.68-10.3-10.5-10.29-10.5-25.52v-86.85q0-14.33 5-27.33 5-13 16-24l477-477q11-11 23.84-16 12.83-5 27-5 14.16 0 27.16 5t24 16l51 51q11 11 16 24t5 26.54q0 14.45-5.02 27.54T795-642L318-165q-11 11-23.95 16t-27.24 5h-86.63ZM744-693l-51-51 51 51Zm-127.95 76.95L591-642l51 51-25.95-25.05Z" />
                                    </svg>
                                </a>
                                <a
                                    href="/deleteAbsence?absence_id=<?= $row['absence_id'] ?>"
                                    class="delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px" fill="#93291e">
                                        <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-12q-15.3 0-25.65-10.29Q192-716.58 192-731.79t10.35-25.71Q212.7-768 228-768h156v-12q0-15.3 10.35-25.65Q404.7-816 420-816h120q15.3 0 25.65 10.35Q576-795.3 576-780v12h156q15.3 0 25.65 10.29Q768-747.42 768-732.21t-10.35 25.71Q747.3-696 732-696h-12v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM419.79-288q15.21 0 25.71-10.35T456-324v-264q0-15.3-10.29-25.65Q435.42-624 420.21-624t-25.71 10.35Q384-603.3 384-588v264q0 15.3 10.29 25.65Q404.58-288 419.79-288Zm120 0q15.21 0 25.71-10.35T576-324v-264q0-15.3-10.29-25.65Q555.42-624 540.21-624t-25.71 10.35Q504-603.3 504-588v264q0 15.3 10.29 25.65Q524.58-288 539.79-288ZM312-696v480-480Z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endif ?>

            <?php endforeach ?>

        </tbody>
    </table>
</div>

<?php if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager'): ?>
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Êtes-vous sûr de vouloir supprimer l'absence ?</p>
            <button id="confirmDelete">Oui</button>
            <button id="cancelDelete">Non</button>
        </div>
    </div>
<?php endif ?>