<div class="content-container">
    <div class="formation-container">
        <form action="/modifyFormation" method="post">
            <?php /** @var array $formation */ ?>
            <input type="hidden" name="formation_id" value="<?= $formation['formation_id'] ?>" />
            <div class="entree">
                <label for="formation_name">Nom de la formation :</label>
                <input type="text" name="formation_name" placeholder="<?= $formation['formation_name'] ?>"
                    value="<?= $formation['formation_name'] ?>" />
            </div>
            <div class="entree">
                <label for="formation_date_start">Date de début de la formation :</label>
                <input type="date" name="formation_date_start" placeholder="<?= $formation['formation_date_start'] ?>"
                    value="<?= $formation['formation_date_start'] ?>" />
            </div>
            <div class="entree">
                <label for="formation_date_end">Date de fin de la formation :</label>
                <input type="date" name="formation_date_end" placeholder="<?= $formation['formation_date_end'] ?>"
                    value="<?= $formation['formation_date_end'] ?>" />
            </div>
            <div class="entree">
                <label for="formation_duration">Durée de la formation :</label>
                <input type="text" name="formation_duration" placeholder="<?= $formation['formation_duration'] ?>"
                    value="<?= $formation['formation_duration'] ?>" />
            </div>
            <div class="entree">
                <label for="formation_qualification">Qualification de la formation :</label>
                <input type="text" name="formation_qualification"
                    placeholder="<?= $formation['formation_qualification'] ?>"
                    value="<?= $formation['formation_qualification'] ?>" />
            </div>
            <div class="entree">
                <label for="formation_type_id">Type de la formation :</label>
                <select name="formation_type_id">
                    <option value="1" <?= $formation['formation_type_id'] == 1 ? 'selected' : '' ?>>Développement
                    </option>
                    <option value="2" <?= $formation['formation_type_id'] == 2 ? 'selected' : '' ?>>Cybersécurité
                    </option>
                    <option value="3" <?= $formation['formation_type_id'] == 3 ? 'selected' : '' ?>>Marketing</option>
                    <option value="4" <?= $formation['formation_type_id'] == 4 ? 'selected' : '' ?>>Réseau et sécurité</option>
                </select>
            </div>
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <input class="bouton-enregistrer" type="submit" value="Enregistrer" />
        </form>
    </div>
</div>