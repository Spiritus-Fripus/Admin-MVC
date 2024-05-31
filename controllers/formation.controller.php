<?php

// Fonction pour afficher et ajouter une formation
function viewAndAddFormationAction()
{
    require_once '../models/admin/formation.manager.php';
    $formations = getAllFormation();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewandaddformation");
        exit();
    }
    $cssFile = '/css/admin/formation-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour ajouter une formation
function addFormationAction()
{
    require_once '../models/admin/formation.manager.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewandaddformation");
        exit();
    }
    $cssFile = '/css/admin/formation-style.css';
    $sidebarTemplate = '../views/sidebar/sidebar.html.php';
    $template = "../views/admin/formation/add-formation.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour supprimer une formation
function deleteFormationAction()
{
    require '../models/admin/formation.manager.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formation_id'])) {
        deleteFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewandaddformation");
        exit();
    }

    $cssFile = '/css/admin/formation-style.css';
    $formations = getAllFormation();
    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour modifier une formation
function modifyFormationAction()
{
    // Implémentation à venir
}
