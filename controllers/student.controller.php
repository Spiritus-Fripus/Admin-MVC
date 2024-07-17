<?php

require_once "../config/config.php";
function indexAction(): void
{
    checkUserRole(['student']);
    $title = "Bienvenue sur admin MNS , vous êtes connecté en tant qu'eleve";
    $cssFiles = ['/css/accueil-style.css'];
    $template = '../views/student/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction(): void
{
    checkUserRole(['student']);
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
