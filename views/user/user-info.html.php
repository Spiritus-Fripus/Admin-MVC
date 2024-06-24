<div class="index-main-container">

    <h1>Information de l'utilisateur : </h1>
    <table class="user-card">
        <tbody>
        <?php
        /** @var mixed $user */
        // Mise à jour de la date en version FR
        try {
            $date = new DateTime($user['user_birthday_date']);
            $formattedDate = $date->format('d-m-Y');
        } catch (Exception $e) {
            error_log('Erreur lors de la création de l\'objet DateTime : ' . $e->getMessage());
            $formattedDate = 'Date invalide'; // Valeur par défaut en cas d'erreur
        } ?>

        <?php
        // switch sur les types
        switch ($user['user_type_id']) {
            case 1:
                $type_user = 'Admin';
                break;
            case 2:
                $type_user = 'Gestionnaire';
                break;
            case 3:
                $type_user = 'Élève';
                break;
        } ?>
        <tr>
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>"/>
            <td data-label="Id"> <?= htmlspecialchars($user['user_id']) ?></td>
            <td data-label="Nom"><?= htmlspecialchars($user['user_name']) ?></td>
            <td data-label="Prénom"><?= htmlspecialchars($user['user_firstname']) ?></td>
            <td data-label="Mail"><?= htmlspecialchars($user['user_mail']) ?></td>
            <td data-label="Tel"><?= htmlspecialchars($user['user_phonenumber']) ?></td>
            <td data-label="Date de naissance"><?= htmlspecialchars($user['user_birthday_date']) ?></td>
            <td data-label="Age"><?= htmlspecialchars($user['age']) ?></td>
            <td data-label="Genre"><?= htmlspecialchars($user['user_gender']) ?></td>
            <td data-label=" Type
        "><?= htmlspecialchars($type_user) ?></td>
        </tr>

        </tbody>
    </table>
</div>