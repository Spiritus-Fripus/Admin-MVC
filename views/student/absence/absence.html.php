<?php
/**
 * @var mixed $absences
 */
?>
<div class="content-container">
    <table>
        <?php foreach ($absences as $absence) { ?>
            <tr>
                <th>Date de début<?= $absence['absence_date_start'] ?></th>
                <th>Date de fin<?= $absence['absence_date_end'] ?></th>
                <th>Date de la déclaration<?= $absence['absence_date_declaration'] ?></th>
                <th>Type d'absence<?= $absence['absence_type_id'] ?></th>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="absence-container">
    <form action="?controller=absence&action=viewownabsence" method="post">
        <div class="entree">
            <label for="absence_date_start">Date de début de l'absence</label>
            <input type="date" name="absence_date_start"/>
        </div>
        <div class="entree">
            <label for="absence_date_end">Date de fin de l'absence</label>
            <input type="date" name="absence_date_end"/>
        </div>
        <div class="entree">
            <select name="absence_type_id" id="absencetypeid">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="entree">
            <label for="absence_date_declaration">Date de déclaration de l'absence</label>
            <input type="date" name="absence_date_declaration"/>
        </div>
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        <input class="bouton-enregistrer" type="submit" value="Enregistrer"/>
    </form>
</div>