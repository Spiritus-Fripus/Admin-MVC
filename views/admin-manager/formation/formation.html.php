<?php

/** @var array|bool $formations */ ?>
<div class="content-container">
    <ul class="formations">
        <?php foreach ($formations as $formation) { ?>
            <ul class="formation">
                <li> <?= htmlspecialchars($formation['formation_name']) ?></li>
                <li> <?= htmlspecialchars($formation['formation_duration']) ?> </li>
                <li> <?= "Bac+" . htmlspecialchars($formation['formation_qualification']) ?></li>
                <div class="boutons-modif">
                    <form action="?controller=formation&action=deleteformation" method="post">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                        <button class="bouton-suppression" type="submit" value="<?= $formation['formation_id'] ?>" name="formation_id" id="deleteFormation"> Supprimer
                        </button>
                    </form>
                    <a href="?controller=formation&action=modifyFormation&formation_id=<?= $formation['formation_id'] ?>" class=bouton-modification>Modifier</a>
                </div>
            </ul>
        <?php } ?>
    </ul>

    <div class="formation-container">
        <form action="?controller=formation&action=viewformation" method="post">
            <div class="entree">
                <label for="formation_name">Nom de la formation</label>
                <input type="text" name="formation_name" required />
            </div>
            <div class="entree">
                <label for="formation_date_start">Date de début de la formation</label>
                <input type="date" name="formation_date_start" required />
            </div>
            <div class="entree">
                <label for="formation_date_end">Date de fin de la formation</label>
                <input type="date" name="formation_date_end" required />
            </div>
            <div class="entree">
                <label for="formation_duration">Durée de la formation</label>
                <input type="text" name="formation_duration" required />
            </div>
            <div class="entree">
                <label for="formation_max_student">Nombre maximal d'élèves</label>
                <input type="number" name="formation_max_student" required />
            </div>
            <div class="entree-select">
                <select name="formation_qualification" required>
                    <option value="1">Bac+1</option>
                    <option value="2">Bac+2</option>
                    <option value="3">Bac+3</option>
                    <option value="5">Bac+5</option>
                </select>
                <select name="formation_type_id" required>
                    <option value="1">Développement</option>
                    <option value="2">Cybersécurité</option>
                    <option value="3">Marketing</option>
                    <option value="4">Réseau</option>
                </select>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <input class="bouton-enregistrer" type="submit" value="Enregistrer" />
            </div>
        </form>
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