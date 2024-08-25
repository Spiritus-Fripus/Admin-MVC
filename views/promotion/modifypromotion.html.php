<div class="content-container">
    <div class="promotion-container">
        <form action="/modifyPromotion" method="post">
            <input type="hidden" name="promotion_id" value="<?= $promotion['promotion_id'] ?>" />
            <div class="entree">
                <label for="promotion_name">Nom de la promotion :</label>
                <input type="text" name="promotion_name" placeholder="<?= $promotion['promotion_name'] ?>" value="<?= $promotion['promotion_name'] ?>" />
            </div>
            <div class="entree">
                <label for="promotion_date_start">Date de début de la promotion :</label>
                <input type="date" name="promotion_date_start" placeholder="<?= $promotion['promotion_date_start'] ?>" value="<?= $promotion['promotion_date_start'] ?>" />
            </div>
            <div class="entree">
                <label for="promotion_date_end">Date de fin de la promotion :</label>
                <input type="date" name="promotion_date_end" placeholder="<?= $promotion['promotion_date_end'] ?>" value="<?= $promotion['promotion_date_end'] ?>" />
            </div>
            <div class="entree">
                <label for="promotion_duration">Durée de la promotion :</label>
                <input type="text" name="promotion_duration" placeholder="<?= $promotion['promotion_duration'] ?>" value="<?= $promotion['promotion_duration'] ?>" />
            </div>
            <div class="entree">
                <label for="promotion_qualification">Qualification de la promotion :</label>
                <input type="text" name="promotion_qualification" placeholder="<?= $promotion['promotion_qualification'] ?>" value="<?= $promotion['promotion_qualification'] ?>" />
            </div>
            <div class="entree">
                <label for="promotion_type_id">Type de la promotion :</label>
                <select name="promotion_type_id">
                    <option value="1" <?= $promotion['promotion_type_id'] == 1 ? 'selected' : '' ?>>Développement
                    </option>
                    <option value="2" <?= $promotion['promotion_type_id'] == 2 ? 'selected' : '' ?>>Cybersécurité
                    </option>
                    <option value="3" <?= $promotion['promotion_type_id'] == 3 ? 'selected' : '' ?>>Marketing</option>
                    <option value="4" <?= $promotion['promotion_type_id'] == 4 ? 'selected' : '' ?>>Réseau et sécurité</option>
                </select>
            </div>
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <input class="bouton-enregistrer" type="submit" value="Enregistrer" />
        </form>
    </div>
</div>