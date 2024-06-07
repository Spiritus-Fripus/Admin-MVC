<?php

require_once "../config/config.php";

function indexAction(): void
{
    checkAdminRole();
    $title = "Bienvenue sur admin MNS , vous êtes connecté en tant qu'administrateur";
    $config = loadLayoutConfig();
    $cssFile = '/css/accueil-style.css';
    $template = '../views/admin/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction(): void
{
    checkAdminRole();
    require '../models/admin/admin.manager.php';
    $recordset = showInfo();
    $title = 'Admin Connected';
    $cssFile = '/css/profil-style.css';
    $config = loadLayoutConfig();
    $template = '../views/profil/profil.html.php';
    require '../views/layouts/layout.html.php';
}

