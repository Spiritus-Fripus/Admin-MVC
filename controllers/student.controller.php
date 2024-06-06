<?php

require_once "../config/config.php";
function indexAction(): void
{
    checkStudentRole();
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'eleve";
    $cssFile = '/css/accueil-style.css';
    $template = '../views/student/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction(): void
{
    checkStudentRole();
    require '../models/student.manager.php';
    $recordset = showInfo();
    $title = 'Student Connected';
    $cssFile = '/css/profil-style.css';
    $template = '../views/profil/profil.html.php';
    require '../views/layouts/layout.html.php';
}
