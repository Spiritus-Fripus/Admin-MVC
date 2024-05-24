<?php

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'eleve";
    $sidebarTemplate = '../views/student/sidebar/student-sidebar.html.php';
    $template = '../views/student/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/student.manager.php';
    $recordset = showInfo();
    $title = 'Student Connected';
    $sidebarTemplate = '../views/student/sidebar/student-sidebar.html.php';
    $template = '../views/student/profil.html.php';
    require '../views/layouts/layout.html.php';
}
