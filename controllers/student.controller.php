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
    $cssFiles =
        [
            '/css/generic/profil-style.css',
            '/css/generic/main-container.css'
        ];
    $template = '../views/profil/profil.html.php';
    require '../views/layouts/layout.html.php';
}
