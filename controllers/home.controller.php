<?php

function indexAction()
{
}

function homeAction()
{
    $title = "Bienvenue sur admin mns";
    $template = '../views/home/home.html.php';
    require '../views/layouts/layout.html.php';
}
