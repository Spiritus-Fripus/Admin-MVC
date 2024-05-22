<ul>
    <?php foreach ($formations as $formation) { ?>
        <li> <?= $formation['formation_name'] ?></li>
        <li> <?= $formation['formation_duration'] ?> </li>
        <li> <?= "Bac+" . $formation['formation_qualification'] ?></li>
    <?php } ?>
</ul>