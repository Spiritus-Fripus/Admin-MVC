<?php

/**
 * PHP DOC
 *  @var mixed $user 
 */

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
}

?>

<div class="content-container">
    <div class="form-container">
        <form action="/updateUser" method="post">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>" />

            <div class="input">
                <label for="name">Nom</label>
                <input type="text" name="name" placeholder="<?= htmlspecialchars($user['user_name']) ?>"
                    value="<?= htmlspecialchars($user['user_name']) ?>">
            </div>
            <div class="input">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" placeholder="<?= htmlspecialchars($user['user_firstname']) ?>"
                    value="<?= htmlspecialchars($user['user_firstname']) ?>">
            </div>

            <div class="input">
                <label for="mail">Mail</label>
                <input type="text" name="mail" placeholder="<?= htmlspecialchars($user['user_mail']) ?>"
                    value="<?= htmlspecialchars($user['user_mail']) ?>">
            </div>

            <div class="input">
                <label for="phone">Téléphone</label>
                <input type="text" name="phone" placeholder="<?= htmlspecialchars($user['user_phonenumber']) ?>"
                    value="<?= htmlspecialchars($user['user_phonenumber']) ?>">
            </div>

            <div class="input">
                <label for="birthday">Date de naissance</label>
                <input type="date" name="birthday" placeholder="<?= htmlspecialchars($user['user_birthday_date']) ?>"
                    value="<?= htmlspecialchars($user['user_birthday_date']) ?>">
            </div>

            <div class="select">
                <select name="gender">
                    <option value="Homme" <?= $user['user_gender'] == 'Homme' ? 'selected' : '' ?>>Homme</option>
                    <option value="Femme" <?= $user['user_gender'] == 'Femme' ? 'selected' : '' ?>>Femme</option>
                    <option value="Autre" <?= $user['user_gender'] == 'Autre' ? 'selected' : '' ?>>Autre</option>
                </select>

                <?php if ($user['user_mail'] !== $_SESSION['user_mail']) : ?>
                    <select name="user_type_id">
                        <option value="3" <?= $user['user_type_id'] == 3 ? 'selected' : '' ?>>Élève</option>
                        <option value="2" <?= $user['user_type_id'] == 2 ? 'selected' : '' ?>>Gestionnaire</option>
                        <option value="1" <?= $user['user_type_id'] == 1 ? 'selected' : '' ?>>Admin</option>
                    </select>
                <?php endif ?>

                <?php if ($user['user_mail'] == $_SESSION['user_mail']) : ?>
                    <select name="user_type_id">
                        <option value="<?= $user['user_type_id'] ?>"><?= htmlspecialchars($type_user) ?></option>
                    </select>
                <?php endif ?>

            </div>
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <input class="button-submit" type="submit" value="Modifier" />
        </form>
    </div>
</div>