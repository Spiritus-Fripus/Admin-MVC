<?php

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'eleve";
    $icons = '../views/icons/icon-header.html.php';
    $cssFile = '/css/accueil-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = '../views/student/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/student.manager.php';
    $recordset = showInfo();
    $title = 'Student Connected';
    $icons = '../views/icons/icon-header.html.php';
    $cssFile = '/css/profil-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = '../views/student/profil.html.php';
    require '../views/layouts/layout.html.php';
}
