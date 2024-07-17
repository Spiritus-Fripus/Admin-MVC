<?php

require_once "../config/config.php";

// Fonction pour afficher et ajouter une formation
function indexAction(): void
{
    require_once '../models/admin/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    $formations = getAllFormation();
    $config = loadLayoutConfig();
    $cssFiles =
        [
            '/css/generic/main-container.css',
            '/css/generic/table-responsive.css',
            '/css/generic/button-crud.css',
            '/css/generic/modal.css'
        ];
    $jsFiles =
        [
            '/js/modal-delete-verify.js',
            '/js/formation.js'
        ];

    $template = "../views/admin-manager/formation/index.html.php";
    require "../views/layouts/layout.html.php";
}

function addFormationAction(): void
{
    require_once '../models/admin/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    $config = loadLayoutConfig();
    $cssFiles =
        [
            '/css/generic/main-container.css',
            '/css/admin/formation-style.css',
            '/css/generic/table-responsive.css',
            '/css/generic/button-crud.css'
        ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifyCsrfToken()) {
            // Jeton CSRF invalide
            require '../models/login/login.manager.php';
            disconnect();
        }
        addFormation();
        header('Location: ?controller=formation&action=index');
    }

    $template = "../views/admin-manager/formation/add-formation.html.php";
    require "../views/layouts/layout.html.php";
}


/**
 * @throws Exception
 */
function archiveFormationAction(): void
{
    checkUserRole(['admin']);
    require '../models/admin/formation.manager.php';

    if (isset($_GET['formation_id'])) {
        archiveFormation($_GET['formation_id']);
    }
    header("Location: ?controller=formation&action=index");
}

// Fonction pour modifier une formation
function modifyFormationAction(): void
{
    require '../models/admin/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['formation_id'])) {
        $config = loadLayoutConfig();
        updateFormation();
        // Redirection vers la liste des formations
        header("Location: ?controller=formation&action=index");
        exit();
    }

    if (isset($_GET['formation_id'])) {
        // Récupérer la formation spécifique
        $formation = getFormationById($_GET['formation_id']);
    } else {
        // Redirection ou message d'erreur si l'ID de la formation n'est pas fourni
        header("Location: ?controller=formation&action=index");
        exit();
    }

    $cssFiles = ['/css/admin/formation-style.css'];
    $config = loadLayoutConfig();
    $template = "../views/admin-manager/formation/modifyformation.html.php";
    require "../views/layouts/layout.html.php";
}
