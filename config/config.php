<?php

function loadLayoutConfig(): array
{
    return [
        'icons' => '../views/icons/icon-header.html.php',
        'burgerMenu' => '../views/burger-menu/burger-menu.html.php',
    ];
}

function verifyCsrfToken(): bool
{
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // Jeton CSRF invalide
        return false;
    }
    return true;
}

function checkUserRole(array $roles): void
{
    if (!isset($_SESSION['user_type']) || !in_array($_SESSION['user_type'], $roles)) {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}