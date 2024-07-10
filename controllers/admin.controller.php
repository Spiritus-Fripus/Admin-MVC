<?php

require_once "../config/config.php";

function indexAction(): void
{
    checkUserRole(['admin']);
    $title = "Bienvenue sur admin MNS , vous êtes connecté en tant qu'administrateur";
    $cssFiles = ['/css/accueil-style.css'];
    $template = '../views/admin/index.html.php';
    $config = loadLayoutConfig();
    require '../views/layouts/layout.html.php';
}

function profilAction(): void
{
    checkUserRole(['admin']);
    require '../models/admin/admin.manager.php';
    $recordset = showInfo();
    $title = 'Admin Connected';
    $cssFiles =
        [
            '/css/profil-style.css',
            '/css/generic/main-container.css'
        ];
    $template = '../views/profil/profil.html.php';
    $config = loadLayoutConfig();
    require '../views/layouts/layout.html.php';
}

