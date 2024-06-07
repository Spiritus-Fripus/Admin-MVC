<?php

require '../config/config.php';
function indexAction(): void
{
    checkAdminRole();
    require '../models/user/user.manager.php';
    showAllUser();
    $recordset = showAllUser();
    $title = 'Liste des utilisateurs';
    $cssFile = '/css/admin/user-style.css';
    $config = loadLayoutConfig();
    $jsFile = '/js/admin/user.js';
    $template = '../views/user/index.html.php';
    require '../views/layouts/layout.html.php';

}