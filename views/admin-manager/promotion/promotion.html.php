<div class="content-container">
    <div class="promotions">
        <?php /** @var mixed $promotions */
        /** @var mixed $formations */
        foreach ($promotions as $promotion) { ?>
            <ul class="promotion">
                <li> <?= htmlspecialchars($promotion['promotion_name']) ?></li>
                <li> <?= "Année promotion: " . htmlspecialchars($promotion['promotion_year']) ?></li>
                <li> <?= $promotion['formation_name'] ?></li>
                <div class="boutons-modif">
                    <form action="?controller=promotion&action=deletePromotion" method="post">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                        <button class="bouton-suppression" type="submit" value="<?= $promotion['promotion_id'] ?>" name="promotion_id" id="deletePromotion"> Supprimer
                        </button>
                    </form>
                    <a href="?controller=promotion&action=modifyPromotion&promotion_id=<?= $formation['promotion_id'] ?>" class="bouton-modification">Modifier</a>
                </div>
            </ul>
        <?php } ?>
    </div>
    <div class="promotion-container">
        <form action="?controller=promotion&action=viewpromotion" method="post">
            <div class="entree">
                <label for="promotion_name">Nom de la promotion</label>
                <input type="text" name="promotion_name" required />
            </div>
            <div class="entree">
                <label for="promotion_year">Année de début de la promotion</label>
                <input type="text" name="promotion_year" required />
            </div>
            <div class="entree">
                <label for="promotion_formation_name">Formation de la promotion</label>
                <select name="promotion_formation_id" id="promotion_formation_id">
                    <?php foreach ($formations as $formation) { ?>
                        <option value="<?= $formation['formation_id'] ?>"><?= $formation['formation_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="entree">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <input class="bouton-enregistrer" type="submit" value="Enregistrer" />
            </div>
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