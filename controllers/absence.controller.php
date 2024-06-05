<?php

function loadConfig()
{
    return include '../config/layout-config.php';
}

//fonction pour voir et ajouter ses propres absences
function viewOwnAbsenceAction()
{
    require_once '../models/absence.manager.php';
    $absences = getAllAbsenceByUserId();
    $config = loadConfig();

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
