<?php foreach ($recordset as $row) { ?>
    <div class="profil-container">
        <div class="profil-header-container">
            <div class="index-header">
                <h1>
                    <?= $row['user_mail'] ?>
                </h1>
            </div>
            <div class="img-container">
                <img src="/img/blank-profile-picture.png" alt="">
            </div>
        </div>
        <div class="profil-main-container">
            <h3>Information de l'utilisateur:</h3>
            <ul>
                <li> id : <?= $row['user_id'] ?></li>
                <hr>
                <li> name : <?= $row['user_name'] ?></li>
                <hr>
                <li> firstname : <?= $row['user_firstname'] ?></li>
                <hr>
                <li> mail : <?= $row['user_mail'] ?></li>
                <hr>
                <li> birthday : <?= $row['user_birthday_date'] ?></li>
                <hr>
                <li>csrf_token : <?= $_SESSION['csrf_token'] ?></li>
                <hr>
            </ul>
        </div>
    </div>
<?php } ?>

