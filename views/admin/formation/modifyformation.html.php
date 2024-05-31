<div class="content-container">
    <form action="?controller=formation&action=updateformation" method="post">
        <input type="hidden" name="formation_id" value="<?= $formation['formation_id'] ?>" />
        <div class="entree">
            <label for="formation_name">Nom de la formation :</label>
            <input type="text" name="formation_name" placeholder="<?= $formation['formation_name'] ?>" value="<?= $formation['formation_name'] ?>" />
        </div>
        <div class="entree">
            <label for="formation_date_start">Date de début de la formation :</label>
            <input type="date" name="formation_date_start" placeholder="<?= $formation['formation_date_start'] ?>" value="<?= $formation['formation_date_start'] ?>" />
        </div>
        <div class="entree">
            <label for="formation_date_end">Date de fin de la formation :</label>
            <input type="date" name="formation_date_end" placeholder="<?= $formation['formation_date_end'] ?>" value="<?= $formation['formation_date_end'] ?>" />
        </div>
        <div class="entree">
            <label for="formation_duration">Durée de la formation :</label>
            <input type="text" name="formation_duration" placeholder="<?= $formation['formation_duration'] ?>" value="<?= $formation['formation_duration'] ?>" />
        </div>
        <div class="entree">
            <label for="formation_qualification">Qualification de la formation :</label>
            <input type="text" name="formation_qualification" placeholder="<?= $formation['formation_qualification'] ?>" value="<?= $formation['formation_qualification'] ?>" />
        </div>
        <input class="bouton-enregistrer" type="submit" value="Enregistrer" />
    </form>
</div>