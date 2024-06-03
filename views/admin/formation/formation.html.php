<div class="content-container">
    <ul class="formations">
        <?php /** @var mixed $formations */
        foreach ($formations as $formation) { ?>
            <ul class="formation">
                <li> <?= $formation['formation_name'] ?></li>
                <li> <?= $formation['formation_duration'] ?> </li>
                <li> <?= "Bac+" . $formation['formation_qualification'] ?></li>
                <div class="boutons-modif">
                    <form action="?controller=formation&action=deleteformation" method="post">
                        <button class="bouton-suppression" type="submit" value="<?= $formation['formation_id'] ?>"
                                name="formation_id" id="deleteFormation"> Supprimer
                        </button>
                    </form>
                    <a href="?controller=formation&action=modificationformation&id=<?= $formation['formation_id'] ?>"
                       class="bouton-modification">Modifier</a>
                </div>
            </ul>
        <?php } ?>
    </ul>

    <div class="formation-container">
        <form action="?controller=formation&action=addformation" method="post">
            <div class="entree">
                <label for="formation_name">Nom de la formation</label>
                <input type="text" name="formation_name"/>
            </div>
            <div class="entree">
                <label for="formation_duration">Durée de la formation</label>
                <input type="text" name="formation_duration"/>
            </div>
            <div class="entree">
                <label for="formation_date_start">Date de début de la formation</label>
                <input type="date" name="formation_date_start"/>
            </div>
            <div class="entree">
                <label for="formation_date_end">Date de fin de la formation</label>
                <input type="date" name="formation_date_end"/>
            </div>
            <div class="entree">
                <label for="formation_max_student">Nombre maximal d'élèves</label>
                <input type="number" name="formation_max_student"/>
            </div>
            <div class="entree-select">
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
                <input class="bouton-enregistrer" type="submit" value="Enregistrer"/>
            </div>
        </form>
    </div>
</div>