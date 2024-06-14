<?php
/** @var mixed $user */

switch ($user['user_type_id']) {
    case 1:
        $type_user = 'admin';
        break;
    case 2:
        $type_user = 'manager';
        break;
    case 3:
        $type_user = 'student';
        break;
} ?>

<div class="index-main-container">
    <form action="?controller=user&action=updateUser" method="post">

        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>"/>

        <label for="name">Nom :</label>
        <input type="text" name="name" placeholder="<?= $user['user_name'] ?>"
               value="<?= htmlspecialchars($user['user_name']) ?>">

        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" placeholder="<?= $user['user_firstname'] ?>"
               value="<?= htmlspecialchars($user['user_firstname']) ?>">

        <label for="mail">Mail :</label>
        <input type="text" name="mail" placeholder="<?= $user['user_mail'] ?>"
               value="<?= htmlspecialchars($user['user_mail']) ?>">

        <label for="phone">Téléphone :</label>
        <input type="text" name="phone" placeholder="<?= $user['user_phonenumber'] ?>"
               value="<?= htmlspecialchars($user['user_phonenumber']) ?>">

        <label for="birthday">Date de naissance :</label>
        <input type="date" name="birthday" placeholder="<?= $user['user_birthday_date'] ?>"
               value="<?= htmlspecialchars($user['user_birthday_date']) ?>">

        <label for="gender">Genre :</label>
        <input type="text" name="gender" placeholder="<?= $user['user_gender'] ?>"
               value="<?= htmlspecialchars($user['user_gender']) ?>">

        <?php if ($user['user_mail'] !== $_SESSION['user_mail']) { ?>
            <label for="user_type_id">Type de l'utilisateur :</label>
            <select name="user_type_id">
                <option value="3" <?= $user['user_type_id'] == 3 ? 'selected' : '' ?>>Eleve</option>
                <option value="2" <?= $user['user_type_id'] == 2 ? 'selected' : '' ?>>Gestionnaire</option>
                <option value="1" <?= $user['user_type_id'] == 1 ? 'selected' : '' ?>>Admin</option>
            </select>
        <?php } ?>

        <?php if ($user['user_mail'] == $_SESSION['user_mail']) { ?>
            <select name="user_type_id">
                <option value="<?= $user['user_type_id'] ?>"><?= $type_user ?></option>
            </select>
        <?php } ?>

        <button type="submit" value="send">Modifier</button>
        
    </form>
</div>