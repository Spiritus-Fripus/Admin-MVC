<?php

function index()
{
    $title = "Bienvenue sur admin mns";
    $template = '../views/home/index.html.php';
    require '../views/layout.html.php';
}

function login()
{
    $title = "Admin MNS";
    $template = '../views/home/login.html.php';
    require '../views/layout.html.php';
}
