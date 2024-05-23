<?php

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'administateur";
    $sidebarTemplate = '../views/admin/sidebar/admin-sidebar.html.php';
    $template = '../views/admin/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/admin.manager.php';
    require '../models/login/login.manager.php';
    $recordset = showInfo();
    $checkSession = checkSession();
    $title = 'Admin Connected';
    $sidebarTemplate = '../views/admin/sidebar/admin-sidebar.html.php';
    $template = '../views/admin/profil.html.php';
    require '../views/layouts/layout.html.php';
};
