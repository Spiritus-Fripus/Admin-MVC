    <div class="container">
        <form action="addformation.php" method="post">
            <label for="formation_name">Nom de la formation</label>
            <input type="text" name="formation_name" />

            <label for="formation_duration">Durée de la formation</label>
            <input type="text" name="formation_duration" />

            <label for="formation_date_start">Date de début de la formation</label>
            <input type="date" name="formation_date_start" />

            <label for="formation_date_end">Date de fin de la formation</label>
            <input type="date" name="formation_date_end" />

            <label for="formation_max_student">Nombre maximal d'élèves</label>
            <input type="number" name="formation_max_student" />

            <select name="formation_qualification">
                <option value="1">Bac+1</option>
                <option value="2">Bac+2</option>
                <option value="3">Bac+3</option>
                <option value="5">Bac+5</option>
            </select>
            <select name="formation_type_id">
                <option value="1">Développement</option>
                <option value="2">Cybersécurité</option>
                <option value="3">Marketing</option>
                <option value="4">Réseau</option>
            </select>
            <input class="bouton" type="submit" value="Enregistrer" />
        </form>
    </div>