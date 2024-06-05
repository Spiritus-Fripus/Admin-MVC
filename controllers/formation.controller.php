<?php

require '../config/config.php';
// Fonction pour afficher et ajouter une formation
function viewFormationAction()
{
    require_once '../models/admin/formation.manager.php';
    checkAdminRole();
    $formations = getAllFormation();
    $config = loadLayoutConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }
    $cssFile = '/css/admin/formation-style.css';
    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour supprimer une formation
function deleteFormationAction()
{
    require '../models/admin/formation.manager.php';
    checkAdminRole();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formation_id'])) {
        $config = loadLayoutConfig();
        deleteFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }

    $cssFile = '/css/admin/formation-style.css';
    $formations = getAllFormation();
    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}

function modifyFormationAction()
{
    require '../models/admin/formation.manager.php';
    checkAdminRole();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formation_id'])) {
        $config = loadLayoutConfig();
        updateFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }

    if (isset($_GET['formation_id'])) {
        // Récupérer la formation spécifique
        $formation = getFormationById($_GET['formation_id']);
    } else {
        // Redirection ou message d'erreur si l'ID de la formation n'est pas fourni
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }

    $cssFile = '/css/admin/formation-style.css';
    $template = "../views/admin/formation/modifyformation.html.php";
    require "../views/layouts/layout.html.php";
}
