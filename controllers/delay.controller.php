<?php

require_once "../config/config.php";

function viewDelayAction(): void
{
    checkAdminRole();
    $config = loadLayoutConfig();
    $title = "Page de gestions des retards";
    $cssFiles =
        [
            '/css/table-responsive.css',
            '/css/generic/main-container.css',
        ];
    $template = '../views/admin/delay/delay.html.php';
    require '../views/layouts/layout.html.php';
}