<?php

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant que professeur";
    $icons = '../views/icons/icon-header.html.php';
    $cssFile = '/css/accueil-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = '../views/teacher/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/teacher.manager.php';
    $recordset = showInfo();
    $title = 'Teacher Connected';
    $icons = '../views/icons/icon-header.html.php';
    $cssFile = '/css/profil-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = '../views/teacher/profil.html.php';
    require '../views/layouts/layout.html.php';
}
