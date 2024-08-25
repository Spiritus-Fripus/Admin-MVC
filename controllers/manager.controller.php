<?php

require_once "../config/config.php";
function indexAction(): void
{
    checkUserRole(['manager']);
    $title = "Bienvenue sur admin MNS , vous êtes connecté en tant que Manager";
    $cssFiles = ['/css/accueil-style.css'];
    $template = '../views/manager/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction(): void
{
    checkUserRole(['manager']);
    require '../models/manager/manager.manager.php';
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
