<div class="content-container">
    <div class="form-container">
        <form action="/addUser" method="post">
            <div class="input">
                <label for="name">Nom</label>
                <input type="text" name="name" />
            </div>
            <div class="input">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" />
            </div>
            <div class="input">
                <label for="mail">Mail</label>
                <input type="email" name="mail" />
            </div>
            <div class="input">
                <label for="phoneNumber">Numéro de téléphone</label>
                <input type="text" name="phoneNumber" />
            </div>
            <div class="input">
                <label for="birthday">Date de naissance</label>
                <input type="date" name="birthday" />
            </div>
            <div class="select">
                <select name="gender">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Autres">Autres</option>
                </select>
                <select name="type_id">
                    <option value="3">Élève</option>
                    <option value="2">Gestionnaire</option>
                    <option value="1">Admin</option>
                </select>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <input class="button-submit" type="submit" value="Ajouter" />
            </div>
        </form>
    </div>
</div>