<?php

require_once "../config/config.php";

function viewDelayAction(): void
{
    checkAdminRole();
    $config = loadLayoutConfig();
    $title = "Page de gestions des retards";
    $cssFile = '/css/admin/formation-style.css';
    $template = '../views/admin/delay/delay.html.php';
    require '../views/layouts/layout.html.php';
}