<?= $checkSession ?>
<h1><?= $title ?> </h1>
<?php foreach ($recordset as $row) { ?>
    <div class="welcome">
        <h1>Bonjour , <?= $row['user_name'] ?> </h1>
    </div>
    <h2>Information de l'utilisateur:</h2>
    <hr>
    <ul>
        <li> id : <?= $row['user_id'] ?></li>
        <li> name : <?= $row['user_name'] ?></li>
        <li> firstname : <?= $row['user_firstname'] ?></li>
        <li> mail : <?= $row['user_mail'] ?></li>
        <li> birthday : <?= $row['user_birthday_date'] ?></li>
    </ul>
    <hr>
<?php } ?>