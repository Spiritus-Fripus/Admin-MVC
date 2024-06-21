<div class="content-container">
    <ul class="formations">
        <?php foreach ($formations as $formation) { ?>
            <li class="formation">
                <div>
                    <span><?= htmlspecialchars($formation['formation_name']) ?></span>
                    <span><?= htmlspecialchars($formation['formation_duration']) ?></span>
                    <span><?= "Bac+" . htmlspecialchars($formation['formation_qualification']) ?></span>
                </div>
                <div class="boutons-modif">
                    <form action="?controller=promotion&action=deletepromotion" method="post">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                        <button class="bouton-suppression" type="submit" value="<?= $promotion['promotion_id'] ?>"
                                name="promotion_id" id="deletePromotion"> Supprimer
                        </button>
                    </form>
                    <a href="?controller=promotion&action=modifyPromotion&promotion_id=<?= $formation['promotion_id'] ?>"
                       class="bouton-modification">Modifier</a>
                </div>
            </ul>
        <?php } ?>
        <ul class="formations">
            <?php /** @var mixed $formations */
            foreach ($formations as $formation) { ?>
                <ul class="formation">
                    <li> <?= $formation['formation_name'] ?></li>
                    <li> <?= $formation['formation_duration'] ?> </li>
                    <li> <?= $formation['formation_date_start'] ?> </li>
                    <li> <?= $formation['formation_date_end'] ?> </li>
                    <li> <?= "Bac+" . $formation['formation_qualification'] ?></li>
                    <a href="?controller=Promotion&action=addPromotion&formation_id=<?= $formation['formation_id'] ?>"
                       class="bouton-ajout-promotion">Ajouter une Promotion
                    </a>
                </ul>
            <?php } ?>
        </ul>
</div>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Êtes-vous sûr de vouloir supprimer cette formation ?</p>
        <button id="confirmDelete">Oui</button>
        <button id="cancelDelete">Non</button>
    </div>
</div>