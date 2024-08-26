<?php

require_once "../config/config.php";

function viewDelayAction(): void
{
    checkUserRole(['admin', 'student', 'manager']);
    $config = loadLayoutConfig();
    $title = "Page de gestions des retards";
    $cssFiles =
        [
            '/css/table-responsive.css',
            '/css/generic/main-container.css',
        ];
    $template = '../views/delay/delay.html.php';
    require '../views/layouts/layout.html.php';
}
