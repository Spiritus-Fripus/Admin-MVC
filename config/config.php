<?php

function checkAdminRole()
{
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}

function checkTeacherRole()
{
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'teacher') {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}

function checkStudentRole()
{
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'student') {
        require '../controllers/error.controller.php';
        unauthorized();
        exit;
    }
}

function loadLayoutConfig()
{
    return [
        'icons' => '../views/icons/icon-header.html.php',
        'sidebarTemplate' => '../views/sidebar/sidebar.html.php',
    ];
}
