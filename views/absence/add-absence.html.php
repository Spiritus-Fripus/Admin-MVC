<div class="content-container">
    <h2><?= $title ?></h2>
    <div class="form-container">
        <form action="/addAbsence" method="post">
            <div class="input">
                <label for="absence-date-start">Début d'absence</label>
                <input type="date" name="absence-date-start" />
            </div>
            <div class="input">
                <label for="absence-date-start">Fin d'absence</label>
                <input type="date" name="absence-date-end" />
            </div>
            <div class="select">
                <select name="absence-type-id">
                    <option value="1">Maladie</option>
                    <option value="2">Personnel</option>
                </select>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <input class="button-submit" type="submit" value="Ajouter absence" />
            </div>
        </form>
    </div>
</div>