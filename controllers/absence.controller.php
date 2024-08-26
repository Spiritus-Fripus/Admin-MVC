<?php

require_once "../config/config.php";

//fonction pour voir et ajouter ses propres absences
function viewOwnAbsenceAction(): void
{
    require_once '../models/absence/absence.manager.php';
    $recordset = getAllAbsenceByUserId();
    $config = loadLayoutConfig();
    $title = 'Affichage des absences';

    $cssFiles =
        [
            '/css/generic/main-container.css',
            '/css/generic/table-responsive.css',
            '/css/generic/button-crud.css',
        ];
    $template = "../views/absence/absence.html.php";
    require "../views/layouts/layout.html.php";
}

function viewAllUserAbsence()
{
    checkUserRole(['admin', 'manager']);
    require_once '../models/absence/absence.manager.php';
    $recordset = getAllAbsence();
    $config = loadLayoutConfig();
    $title = 'Affichage des absences';
    $cssFiles =
        [
            '/css/generic/main-container.css',
            '/css/generic/table-responsive.css',
            '/css/generic/button-crud.css',
            '/css/generic/modal.css',
        ];
    $jsFiles =
        [
            '/js/modal-delete-verify.js',
        ];
    $template = "../views/absence/absence.html.php";
    require "../views/layouts/layout.html.php";
}

function addAbsenceAction(): void
{

    require_once '../models/absence/absence.manager.php';

    $config = loadLayoutConfig();
    $title = "Déclaration d'une absence";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        addAbsence();
        // Regenère CSRF token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        // Redirection vers la liste des absences de l'élève
        header("Location: /absence");
        exit();
    }

    $cssFiles = ['/css/generic/form.css'];
    $template = "../views/absence/add-absence.html.php";
    require "../views/layouts/layout.html.php";
}


function deleteAbsenceAction(): void
{
    checkUserRole(['admin', 'manager']);
    require_once '../models/absence/absence.manager.php';
    $absences = getAllAbsenceByUserId();
    $config = loadLayoutConfig();

    if (isset($_GET['absence_id'])) {
        deleteAbsence($_GET['absence_id']);
    }
    //redirection vers la liste des absences
    header("Location: /absenceUser");
}
