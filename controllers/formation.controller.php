<?php
//toutes les verifs dans le controller 
function viewFormationAction()
{
    require '../models/admin/formation.manager.php';
    $formations = getAllFormation();

    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}

function addFormationAction()
{
    require '../models/admin/formation.manager.php';
    //require '../admin/include/verify.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }

    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}


function deleteFormationAction()
{
    require '../models/admin/formation.manager.php';
    //require '../admin/include/verify.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['formation_id']))) {
        deleteFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }

    $formations = getAllFormation();

    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}


function modifyFormationAction()
{
}
