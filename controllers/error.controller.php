<?php

function notFound()
{
    http_response_code(404);

    $title = 'Erreur 404 - page introuvable';
    $template = '../views/error/not-found.html.php';
    require '../views/layouts/layout.html.php';
}

function unauthorized()
{
    http_response_code(403);
    
    $title = 'Erreur 403 - Accès non authorisé';
    $template = '../views/error/unauthorized.html.php';
    require '../views/layouts/layout.html.php';
}