<?php

function index()
{
    require './models/admin/formation.manager.php';
    $formations = getAllFormation();

    $template = "../views/admin/formation.html.php";
    require "../views/layout.html.php";
}
