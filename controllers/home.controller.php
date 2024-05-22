<?php

function indexAction()
{
    require '../views/home/index.html.php';
}

function homeAction()
{
    $title = "Bienvenue sur admin mns";
    $template = '../views/home/home.html.php';
    require '../views/layouts/layout.html.php';
}
