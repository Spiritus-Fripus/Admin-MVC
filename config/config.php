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

function checkAdminRole(): void
{
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}

function checkManagerRole(): void
{
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'manager') {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}

function checkAdminManagerRole(): void
{
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'manager' && $_SESSION['user_type'] !== 'admin') {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}

function checkStudentRole(): void
{
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'student') {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}