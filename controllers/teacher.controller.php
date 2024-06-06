<?php

require_once "../config/config.php";
function indexAction(): void
{
    checkTeacherRole();
    $title = "Bienvenue sur admin MNS , vous etes connecté en tant que professeur";
    $cssFile = '/css/accueil-style.css';
    $template = '../views/teacher/index.html.php';
    require '../views/layouts/layout.html.php';
}

function profilAction(): void
{
    checkTeacherRole();
    require '../models/teacher.manager.php';
    $recordset = showInfo();
    $title = 'Teacher Connected';
    $cssFile = '/css/profil-style.css';
    $template = '../views/profil/profil.html.php';
    require '../views/layouts/layout.html.php';
}
