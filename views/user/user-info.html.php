<div class="main-container-center-column">

    <h1>Information de l'utilisateur : </h1>
    <table class="user-card">
        <tbody>
            <?php
            // Mise à jour de la date en version FR
            try {
                $date = new DateTime($user['user_birthday_date']);
                $formattedDate = $date->format('d-m-Y');
            } catch (Exception $e) {
                error_log('Erreur lors de la création de l\'objet DateTime : ' . $e->getMessage());
                $formattedDate = 'Date invalide'; // Valeur par défaut en cas d'erreur
            } ?>


            <tr>
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>" />
                <td data-label="Id"> <?= htmlspecialchars($user['user_id']) ?></td>
                <td data-label="Nom"><?= htmlspecialchars($user['user_name']) ?></td>
                <td data-label="Prénom"><?= htmlspecialchars($user['user_firstname']) ?></td>
                <td data-label="Mail"><?= htmlspecialchars($user['user_mail']) ?></td>
                <td data-label="Tel"><?= htmlspecialchars($user['user_phonenumber']) ?></td>
                <td data-label="Date de naissance"><?= htmlspecialchars($user['user_birthday_date']) ?></td>
                <td data-label="Age"><?= htmlspecialchars($user['age']) ?></td>
                <td data-label="Genre"><?= htmlspecialchars($user['user_gender']) ?></td>
                <td data-label=" Type"><?= htmlspecialchars($user['user_type_name']) ?></td>
                <td data-label=" Créé le"><?= htmlspecialchars($user['created_at']) ?></td>
                <td data-label=" Créé par"><?= htmlspecialchars($user['created_by']) ?></td>
            </tr>

        </tbody>
    </table>
</div>