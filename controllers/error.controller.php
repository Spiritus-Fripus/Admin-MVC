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
    http_response_code(403);
    $cssFiles = ['/css/accueil-style.css'];
    $title = 'Erreur 403 - Accès interdit';
    $template = '../views/error/not-found.html.php';
    require '../views/layouts/layout.html.php';
}