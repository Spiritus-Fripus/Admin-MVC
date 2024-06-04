<?php

function loadConfig()
{
    return include '../config/layout-config.php';
}

function viewOwnAbsenceAction()
{
    require_once '../models/absence.manager.php';
    $absences = getAllAbsenceByUserId(1);
    $config = loadConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //addAbsence();
        // Redirection vers la liste des absences de l'élève
        header("Location: ?controller=absence&action=viewabsence");
        exit();
    }
    $cssFile = '/css/student/absence-style.css';
    $template = "../views/student/absence/index.html.php";
    require "../views/layouts/layout.html.php";
}
