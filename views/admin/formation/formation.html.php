<ul>
    <?php foreach ($formations as $formation) { ?>
        <li> <?= $formation['formation_name'] ?></li>
        <li> <?= $formation['formation_duration'] ?> </li>
        <li> <?= "Bac+" . $formation['formation_qualification'] ?></li>
        <form action="?controller=formation&action=deleteformation" method="post">
            <button type="submit" value="<?= $formation['formation_id'] ?>" name="formation_id" id="deleteFormation"> Supprimer la formation </button>
        </form>
    <?php } ?>
</ul>