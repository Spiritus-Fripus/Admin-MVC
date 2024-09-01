<?php

require_once "../config/config.php";

// Fonction pour afficher et ajouter une formation
function viewPromotionAction(): void
{
    require_once '../models/promotion/promotion.manager.php';
    require_once '../models/formation/formation.manager.php';
    checkUserRole(['admin', 'manager']);
    $promotions = getAllPromotion();
    $formations = getAllFormation();
    $formationstypes = getAllFormationType();
    $formationpromotion = getFormationOfPromotion();
    $config = loadLayoutConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createPromotion();
        // Redirection vers la liste des promotions
        header("Location: /promotion");
        exit();
    }
    $cssFiles = ['/css/admin/promotion-style.css'];
    $jsFiles = ['/js/modal-delete-verify.js'];
    $template = "../views/promotion/promotion.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour modifier une formation
function modifyPromotionAction(): void
{
    require_once '../models/formation/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updatePromotion();
        // Regenère CSRF token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        // Redirection vers la liste des formations
        header("Location: /promotion");
        exit();
    }

    $promotionId = $_GET['promotion_id'];
    $promotion = getPromotionById($promotionId);
    $promotions = getAllPromotion();
    $formations = getAllFormation();
    $formationstypes = getAllFormationType();
    $formationpromotion = getFormationOfPromotion();
    $config = loadLayoutConfig();
    $cssFile = '/css/admin/promotion-style.css';
    $template = "../views/promotion/promotion.html.php";
    require "../views/layouts/layout.html.php";
}

function deletePromotionAction(): void
{
    require_once '../models/promotion/promotion.manager.php';
    require_once '../models/formation/formation.manager.php';
    checkUserRole(['admin', 'manager']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promotion_id'])) {
        deletePromotion();
        // Regenère CSRF token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        // Redirection vers la liste des promotions
        header("Location: /promotion");
        exit();
    }

    $promotions = getAllPromotion();
    $formationpromotion = getFormationOfPromotion();
    $formations = getAllFormation();
    $cssFile = '/css/admin/promotion-style.css';
    $jsFiles = ['/js/modal-delete-verify.js'];
    $config = loadLayoutConfig();
    $cssFiles = ['/css/admin/formation-style.css'];
    $template = "../views/admin-manager/formation/modify-index.html.php";
    require "../views/layouts/layout.html.php";
}
