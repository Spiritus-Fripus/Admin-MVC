<?php

function loadConfig()
{
    return include '../config/layout-config.php';
}

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous êtes connecté en tant qu'administrateur";
    $config = loadConfig();
    $cssFile = '/css/accueil-style.css';
    $template = '../views/admin/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/admin/admin.manager.php';
    $recordset = showInfo();
    $title = 'Admin Connected';
    $cssFile = '/css/profil-style.css';
    $config = loadConfig();
    $template = '../views/admin/profil.html.php';
    require '../views/layouts/layout.html.php';
};
