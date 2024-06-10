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
    $config = loadLayoutConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createPromotion();
        // Redirection vers la liste des promotions
        header("Location: ?controller=promotion&action=viewpromotion");
        exit();
    }
    $cssFile = '/css/admin/promotion-style.css';
    $template = "../views/admin-manager/promotion/promotion.html.php";
    require "../views/layouts/layout.html.php";
}
