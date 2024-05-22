<?php

function notFound()
{
    http_response_code(404);

    $template = '../views/error/not-found.html.php';
    require '../views/layous/layout.html.php';
}
