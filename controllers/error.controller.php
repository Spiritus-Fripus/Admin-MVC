<?php


function notFound(): void
{
    http_response_code(404);
    $cssFiles = ['/css/accueil-style.css'];
    $title = 'Erreur 404 - page introuvable';
    $template = '../views/error/not-found.html.php';
    require '../views/layouts/layout.html.php';
}


function unauthorized(): void
{
    require_once '../models/login/login.manager.php';
    http_response_code(403);
    disconnect();
}
