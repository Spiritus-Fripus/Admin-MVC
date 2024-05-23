<?php

function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant que professeur";
    $sidebarTemplate = '../views/teacher/sidebar/teacher-sidebar.html.php';
    $template = '../views/teacher/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/teacher.manager.php';
    $recordset = showInfo();
    $title = 'Teacher Connected';
    $sidebarTemplate = '../views/teacher/sidebar/teacher-sidebar.html.php';
    $template = '../views/teacher/profil.html.php';
    require '../views/layouts/layout.html.php';
}
