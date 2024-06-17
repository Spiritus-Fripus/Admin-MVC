<?php

require_once "../config/config.php";

// Fonction pour afficher et ajouter une formation
function viewFormationAction(): void
{
    require_once '../models/admin/formation.manager.php';
    checkAdminManagerRole();

    $formations = getAllFormation();
    $config = loadLayoutConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }
    $cssFile = '/css/admin/formation-style.css';
    $jsFile = '/js/formation.js';
    $template = "../views/admin-manager/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour supprimer une formation
function deleteFormationAction(): void
{
    require '../models/admin/formation.manager.php';
    checkAdminManagerRole();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formation_id'])) {
        $config = loadLayoutConfig();
        deleteFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=viewformation");
        exit();
    }

    $cssFile = '/css/admin-manager/formation-style.css';
    $formations = getAllFormation();
    $config = loadLayoutConfig();
    $template = "../views/admin/formation/formation.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour modifier une formation
function modifyFormationAction(): void
{
    require '../models/admin/formation.manager.php';
    checkAdminManagerRole();

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
    $config = loadLayoutConfig();
    $template = "../views/admin-manager/formation/modifyformation.html.php";
    require "../views/layouts/layout.html.php";
}
