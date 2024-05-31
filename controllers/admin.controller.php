<?php


function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'administateur";
    $icons = '../views/icons/icon-header.html.php';
    $cssFile = '/css/profil-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = '../views/admin/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/admin/admin.manager.php';
    $recordset = showInfo();
    $title = 'Admin Connected';
    $icons = '../views/icons/icon-header.html.php';
    $cssFile = '/css/profil-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = '../views/admin/profil.html.php';
    require '../views/layouts/layout.html.php';
};
