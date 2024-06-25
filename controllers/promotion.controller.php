<?php

require_once "../config/config.php";

// Fonction pour afficher et ajouter une formation
function viewPromotionAction(): void
{
    require_once '../models/admin/promotion.manager.php';
    require_once '../models/admin/formation.manager.php';
    checkAdminManagerRole();
    $promotions = getAllPromotion();
    $formations = getAllFormation();
    $formationstypes = getAllFormationType();
    $formationpromotion = getFormationOfPromotion();
    $config = loadLayoutConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createPromotion();
        // Redirection vers la liste des promotions
        header("Location: ?controller=promotion&action=viewpromotion");
        exit();
    }
    $cssFile = '/css/admin/promotion-style.css';
    $jsFile = '/js/promotion.js';
    $template = "../views/admin-manager/promotion/promotion.html.php";
    require "../views/layouts/layout.html.php";
}

// Fonction pour modifier une formation
function modifyPromotionAction(): void
{
    require_once '../models/admin/promotion.manager.php';
    checkAdminManagerRole();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        updatePromotion();
        // Redirection vers la liste des formations
        header("Location: ?controller=promotion&action=viewpromotion");
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
    $template = "../views/admin-manager/promotion/promotion.html.php";
    require "../views/layouts/layout.html.php";
}

function deletePromotionAction(): void
{
    require_once '../models/admin/promotion.manager.php';
    checkAdminManagerRole();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        deletePromotion();
        // Redirection vers la liste des promotions
        header("Location: ?controller=promotion&action=viewpromotion");
        exit();
    }
    $promotions = getAllPromotion();
    $formationpromotion = getFormationOfPromotion();
    $formations = getAllFormation();
    $cssFile = '/css/admin/promotion-style.css';
    $jsFile = '/js/promotion.js';
    $config = loadLayoutConfig();
    $template = "../views/admin-manager/promotion/promotion.html.php";
    require "../views/layouts/layout.html.php";
}
