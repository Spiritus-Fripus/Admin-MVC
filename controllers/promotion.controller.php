<?php

function loadConfig()
{
    return include '../config/layout-config.php';
}

// Fonction pour afficher et ajouter une formation
function viewPromotionAction()
{
    require_once '../models/admin/promotion.manager.php';
    $promotions = getAllPromotion();
    $config = loadConfig();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        createPromotion();
        // Redirection vers la liste des promotions
        header("Location: ?controller=promotion&action=viewpromotion");
        exit();
    }
    $cssFile = '/css/admin/promotion-style.css';
    $template = "../views/admin/promotion/promotion.html.php";
    require "../views/layouts/layout.html.php";
}
