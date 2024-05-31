<?php

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'eleve";
    $cssFile = '/css/accueil-style.css';
    $sidebarTemplate = '../views/student/sidebar/student-sidebar.html.php';
    $template = '../views/student/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/student.manager.php';
    $recordset = showInfo();
    $title = 'Student Connected';
    $cssFile = '/css/profil-style.css';
    $sidebarTemplate = '../views/student/sidebar/student-sidebar.html.php';
    $template = '../views/student/profil.html.php';
    require '../views/layouts/layout.html.php';
}
