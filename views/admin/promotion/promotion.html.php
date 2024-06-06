<div class="content-container">
    <ul class="promotions">
        <?php foreach ($promotions as $promotion) { ?>
            <ul class="formation">
                <li> <?= $promotion['promotion_name'] ?></li>
                <li> <?= $promotion['promotion_year'] ?> </li>
                <div class="boutons-modif">
                    <form action="?controller=promotion&action=deletepromotion" method="post">
                        <button class="bouton-suppression" type="submit" value="<?= $promotion['promotion_id'] ?>" name="promotion_id" id="deletePromotion"> Supprimer</button>
                    </form>
                    <a href="?controller=promotion&action=modifyPromotion&promotion_id=<?= $formation['promotion_id'] ?>" class="bouton-modification">Modifier</a>
                </div>
            </ul>
        <?php } ?>
    </ul>