<?php

require '../config/config.php';

//fonction pour voir et ajouter ses propres absences
function viewOwnAbsenceAction()
{
    require_once '../models/absence.manager.php';
    $absences = getAllAbsenceByUserId();
    $config = loadLayoutConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        addAbsence();
        // Redirection vers la liste des absences de l'élève
        header("Location: ?controller=absence&action=viewownabsence");
        exit();
    }

    $cssFile = '/css/student/absence-style.css';
    $template = "../views/student/absence/index.html.php";
    require "../views/layouts/layout.html.php";
}

function deleteAbsence()
{
    require_once '../models/absence.manager.php';
    $absences = getAllAbsenceByUserId();
    $config = loadLayoutConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['absence_id'] != "") {
        deleteAbsence();
        //redirection vers la liste des absences
        header("Location: ?controller=absence&action=viewabsence");
        exit();
    }

    $cssFile = '/css/student/absence-style.css';
    $template = "../views/student/absence/index.html.php";
    require "../views/layouts/layout.html.php";
}
