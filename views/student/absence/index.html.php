<div class="content-container">
    <table>
        <?php foreach ($absences as $absence) { ?>
            <tr>
                <th><?= $absence['absence_date_start'] ?></th>
                <th><?= $absence['absence_date_end'] ?></th>
                <th><?= $absence['absence_date_declaration'] ?></th>
                <th><?= $absence['absence_type_id'] ?></th>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="absence-container">
    <form action="?controller=absence&action=addabsence" method="post">
        <div class="entree">
            <label for="absence_date_start">Date de début de l'absence</label>
            <input type="date" name="absence_date_start" />
        </div>
        <div class="entree">
            <label for="absence_date_end">Date de fin de l'absence</label>
            <input type="date" name="absence_date_end" />
        </div>
        <div class="entree">
            <label for="absence">Date de début de la formation</label>
            <input type="date" name="formation_date_start" />
        </div>
    </form>
</div>