<?php
function loadConfig()
{
    return include '../config/layout-config.php';
}
function indexAction()
{
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'eleve";
    $cssFile = '/css/accueil-style.css';
    $template = '../views/student/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    require '../models/student.manager.php';
    $recordset = showInfo();
    $title = 'Student Connected';
    $cssFile = '/css/profil-style.css';
    $template = '../views/student/profil.html.php';
    require '../views/layouts/layout.html.php';
}
