<div class="content-container">
    <div class="form-container">
        <form action="/addUser" method="post">
            <div class="input">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" />
            </div>
            <div class="input">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" />
            </div>
            <div class="input">
                <label for="mail">Mail</label>
                <input type="email" name="mail" id="mail" />
            </div>
            <div class="input">
                <label for="phoneNumber">Numéro de téléphone</label>
                <input type="text" name="phoneNumber" id="phoneNumber" />
            </div>
            <div class="input">
                <label for="birthday">Date de naissance</label>
                <input type="date" name="birthday" id="birthday" />
            </div>
            <div class="select">
                <label for="gender">Genre</label>
                <select name="gender" id="gender">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Autres">Autres</option>
                </select>
                <label for="type_id">Type d'utilisateur</label>
                <select name="type_id" id="type_id">
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