<?php
require '../config/config.php';
function indexAction()
{
    checkStudentRole();
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant qu'eleve";
    $cssFile = '/css/accueil-style.css';
    $template = '../views/student/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction()
{
    checkStudentRole();
    require '../models/student.manager.php';
    $recordset = showInfo();
    $title = 'Student Connected';
    $cssFile = '/css/profil-style.css';
    $template = '../views/student/profil.html.php';
    require '../views/layouts/layout.html.php';
}
