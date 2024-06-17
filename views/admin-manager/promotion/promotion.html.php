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
                    <form action="?controller=formation&action=deleteformation" method="post" class="delete-form">
                        <input type="hidden" name="formation_id" value="<?= htmlspecialchars($formation['formation_id']) ?>">
                        <button class="bouton-suppression" type="button">Supprimer</button>
                    </form>
                    <a href="?controller=formation&action=modifyFormation&formation_id=<?= htmlspecialchars($formation['formation_id']) ?>" class="bouton-modification">Modifier</a>
                </div>

                <!-- Section des promotions -->
                <div class="promotions">
                    <h3>Promotions</h3>
                    <?php if (isset($formation['promotions']) && is_array($formation['promotions']) && count($formation['promotions']) > 0) : ?>
                        <ul class="promotion-list">
                            <?php foreach ($formation['promotions'] as $promotion) { ?>
                                <li class="promotion-item">
                                    <span><?= htmlspecialchars($promotion['promotion_name']) ?></span>
                                    <form action="?controller=promotion&action=deletePromotion" method="post" class="delete-promotion-form">
                                        <input type="hidden" name="promotion_id" value="<?= htmlspecialchars($promotion['promotion_id']) ?>">
                                        <button class="bouton-suppression" type="button">Supprimer</button>
                                    </form>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php else : ?>
                        <p>Aucune promotion trouvée.</p>
                    <?php endif; ?>

                    <!-- Formulaire pour ajouter une nouvelle promotion -->
                    <form action="?controller=promotion&action=createPromotion" method="post" class="create-promotion-form">
                        <input type="hidden" name="formation_id" value="<?= htmlspecialchars($formation['formation_id']) ?>">
                        <div class="entree">
                            <label for="promotion_name_<?= htmlspecialchars($formation['formation_id']) ?>">Nom de la promotion</label>
                            <input type="text" id="promotion_name_<?= htmlspecialchars($formation['formation_id']) ?>" name="promotion_name" required />
                        </div>
                        <div class="entree">
                            <label for="promotion_date_start_<?= htmlspecialchars($formation['formation_id']) ?>">Date de début</label>
                            <input type="date" id="promotion_date_start_<?= htmlspecialchars($formation['formation_id']) ?>" name="promotion_date_start" required />
                        </div>
                        <div class="entree">
                            <label for="promotion_date_end_<?= htmlspecialchars($formation['formation_id']) ?>">Date de fin</label>
                            <input type="date" id="promotion_date_end_<?= htmlspecialchars($formation['formation_id']) ?>" name="promotion_date_end" required />
                        </div>
                        <input class="bouton-enregistrer" type="submit" value="Ajouter Promotion" />
                    </form>
                </div>
            </li>
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