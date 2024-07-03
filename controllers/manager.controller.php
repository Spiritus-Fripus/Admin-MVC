<?php

require_once "../config/config.php";
function indexAction(): void
{
    checkManagerRole();
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant que Manager";
    $cssFile = '/css/accueil-style.css';
    $template = '../views/manager/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction(): void
{
    checkManagerRole();
    require '../models/manager.manager.php';
    $recordset = showInfo();
    $title = 'Manager Connected';
    $cssFiles =
        [
            '/css/generic/profil-style.css',
            '/css/generic/main-container.css'
        ];
    $template = '../views/profil/profil.html.php';
    require '../views/layouts/layout.html.php';
}
