<?php /** @var array|bool $recordset */ ?>
<div class="main-container-center-column">
    <form action="?controller=user&action=index" method="post" class="form-search">

        <div class="form-searchbar">
            <!-- SEARCHBAR -->
            <label for="search"></label>
            <input type="text" name=search class="search-bar" placeholder="Recherche">
            <!-- END / SEARCHBAR -->
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <button class="submit-button" type="submit">Rechercher</button>
        </div>


        <div class="form-sort">
            <!-- TRI PAR ID/NAME/FIRSTNAME -->
            <select name="sort-by" id="">
                <option value="created_at" <?= isset($_POST['sort-by']) && $_POST['sort-by'] == 'created_at' ? 'selected' : '' ?>>
                    Ajout
                </option>
                <option value="user_name" <?= isset($_POST['sort-by']) && $_POST['sort-by'] == 'user_name' ? 'selected' : '' ?>>
                    Nom
                </option>
                <option value="user_firstname" <?= isset($_POST['sort-by']) && $_POST['sort-by'] == 'user_firstname' ? 'selected' : '' ?>>
                    Prénom
                </option>
            </select>
            <!-- END / TRI PAR ID/NAME/FIRSTNAME-->

            <!-- ORDER BY  -->
            <select name="sort-direction" id="">
                <option value="ASC" <?= isset($_POST['sort-direction']) && $_POST['sort-direction'] == 'ASC' ? 'selected' : '' ?>>
                    ASC
                </option>
                <option value="DESC" <?= isset($_POST['sort-direction']) && $_POST['sort-direction'] == 'DESC' ? 'selected' : '' ?>>
                    DESC
                </option>
            </select>
            <!-- END / ORDER BY  -->

            <!-- TRI PAR TYPE -->
            <select name="sort-type" id="">
                <option value="ALL" <?= isset($_POST['sort-type']) && $_POST['sort-type'] == 'ALL' ? 'selected' : '' ?>>
                    Tous
                </option>
                <option value="1" <?= isset($_POST['sort-type']) && $_POST['sort-type'] == '1' ? 'selected' : '' ?>>
                    Admin
                </option>
                <option value="2" <?= isset($_POST['sort-type']) && $_POST['sort-type'] == '2' ? 'selected' : '' ?>>
                    Gestionnaire
                </option>
                <option value="3" <?= isset($_POST['sort-type']) && $_POST['sort-type'] == '3' ? 'selected' : '' ?>>
                    Élève
                </option>
            </select>
            <!-- END / TRI PAR TYPE -->

        </div>
    </form>
    <div class="user-link">
        <a href="?controller=user&action=addUser" class="link">Ajouter un utilisateur</a>
        <a href="?controller=user-archive&action=index" class="link">Archives</a>
    </div>

    <table class="table-container">

        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Type</th>
            <th>Voir/Modifier/Supprimer</th>

        </tr>
        </thead>

        <tbody>

        <?php foreach ($recordset as $row) { ?>
            <?php
            // Mise à jour de la date en version FR
            try {
                $date = new DateTime($row['user_birthday_date']);
                $formattedDate = $date->format('d-m-Y');
            } catch (Exception $e) {
                error_log('Erreur lors de la création de l\'objet DateTime : ' . $e->getMessage());
                $formattedDate = 'Date invalide'; // Valeur par défaut en cas d'erreur
            } ?>


            <tr>
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($row['user_id']) ?>"/>
                <td data-label="Nom"><?= htmlspecialchars($row['user_name']) ?></td>
                <td data-label="Prénom"> <?= htmlspecialchars($row['user_firstname']) ?></td>
                <td data-label=" Type"><?= htmlspecialchars($row['user_type_name']) ?></td>
                <td>
                    <div class="button-crud">
                        <a
                                href="?controller=user&action=userInfo&user_id=<?= $row['user_id'] ?>"
                                class="see"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                 width="20px"
                                 fill="#649c25">
                                <path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.67-91.23-220.84-91.23-91.16-221-91.16Q350-792 259-700.84 168-609.67 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.28 312Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z"/>
                            </svg>
                        </a>

                        <a
                                href="?controller=user&action=updateUser&user_id=<?= $row['user_id'] ?>"
                                class="modify"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                 width="20px"
                                 fill="#283e58">
                                <path d="M216-216h51l375-375-51-51-375 375v51Zm-35.82 72q-15.18 0-25.68-10.3-10.5-10.29-10.5-25.52v-86.85q0-14.33 5-27.33 5-13 16-24l477-477q11-11 23.84-16 12.83-5 27-5 14.16 0 27.16 5t24 16l51 51q11 11 16 24t5 26.54q0 14.45-5.02 27.54T795-642L318-165q-11 11-23.95 16t-27.24 5h-86.63ZM744-693l-51-51 51 51Zm-127.95 76.95L591-642l51 51-25.95-25.05Z"/>
                            </svg>
                        </a>

                        <?php if ($row['user_mail'] !== $_SESSION['user_mail']) { ?>
                            <a
                                    href="?controller=user&action=archiveUser&user_id=<?= $row['user_id'] ?>"
                                    class="delete"
                                    data-user-id="<?= $row['user_id'] ?>"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                     width="20px" fill="#93291e">
                                    <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-12q-15.3 0-25.65-10.29Q192-716.58 192-731.79t10.35-25.71Q212.7-768 228-768h156v-12q0-15.3 10.35-25.65Q404.7-816 420-816h120q15.3 0 25.65 10.35Q576-795.3 576-780v12h156q15.3 0 25.65 10.29Q768-747.42 768-732.21t-10.35 25.71Q747.3-696 732-696h-12v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM419.79-288q15.21 0 25.71-10.35T456-324v-264q0-15.3-10.29-25.65Q435.42-624 420.21-624t-25.71 10.35Q384-603.3 384-588v264q0 15.3 10.29 25.65Q404.58-288 419.79-288Zm120 0q15.21 0 25.71-10.35T576-324v-264q0-15.3-10.29-25.65Q555.42-624 540.21-624t-25.71 10.35Q504-603.3 504-588v264q0 15.3 10.29 25.65Q524.58-288 539.79-288ZM312-696v480-480Z"/>
                                </svg>
                            </a>

                        <?php } ?>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


</div>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Êtes-vous sûr de vouloir archiver l'utilisateur ?</p>
        <button id="confirmDelete">Oui</button>
        <button id="cancelDelete">Non</button>
    </div>
</div>