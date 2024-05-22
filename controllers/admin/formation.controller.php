<?php

function viewFormation()
{
    require '../models/admin/formation.manager.php';
    $formations = getAllFormation();

    $template = "../views/admin/formation.html.php";
    require "../views/layout.html.php";
}

function addFormation()
{
    require '../models/admin/formation.manager.php';
    $formation = createFormation();

    $template = "../views/admin/formation/addformation.html.php";
    require "../views/layout.html.php";
}
