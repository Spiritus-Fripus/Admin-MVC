<div class="main-container-center-column">

    <div class="formation-container">
        <form action="?controller=formation&action=index" method="post">
            <div class="entree">
                <label for="formation_name">Nom de la formation</label>
                <input type="text" name="formation_name" required/>
            </div>
            <div class="entree">
                <label for="formation_date_start">Date de début de la formation</label>
                <input type="date" name="formation_date_start" id="formation_date_start" required/>
            </div>
            <div class="entree">
                <label for="formation_date_end">Date de fin de la formation</label>
                <input type="date" name="formation_date_end" id="formation_date_end" required/>
            </div>
            <div class="entree">
                <label for="formation_duration">Durée de la formation</label>
                <input type="text" name="formation_duration" id="formation_duration" readonly/>
            </div>
            <div class="entree">
                <label for="formation_max_student">Nombre maximal d'élèves</label>
                <input type="number" name="formation_max_student" required/>
            </div>
            <div class="entree-select">
                <select name="formation_qualification" required>
                    <option value="1">Bac+1</option>
                    <option value="2">Bac+2</option>
                    <option value="3">Bac+3</option>
                    <option value="5">Bac+5</option>
                </select>
                <select name="formation_type_id" required>
                    <option value="1">Développement</option>
                    <option value="2">Cybersécurité</option>
                    <option value="3">Marketing</option>
                    <option value="4">Réseau et sécurité</option>
                </select>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <input class="bouton-enregistrer" type="submit" value="Enregistrer"/>
            </div>
        </form>
    </div>
</div>