<?php

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'administateur";
    $cssFile = '/css/accueil-style.css';
    $sidebarTemplate = '../views/admin/sidebar/admin-sidebar.html.php';
    $template = '../views/admin/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/admin/admin.manager.php';
    $recordset = showInfo();
    $title = 'Admin Connected';
    $cssFile = '/css/profil-style.css';
    $sidebarTemplate = '../views/admin/sidebar/admin-sidebar.html.php';
    $template = '../views/admin/profil.html.php';
    require '../views/layouts/layout.html.php';
};
