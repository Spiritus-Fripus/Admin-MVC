<?php

require_once '../config/config.php';

function indexAction(): void
{
    checkUserRole(['admin']);
    require '../models/user/user-archive.manager.php';

    $search = $_POST['search'] ?? '';
    $orderBy = $_POST['sort-by'] ?? 'user_archive_id';
    $direction = $_POST['sort-direction'] ?? 'DESC';
    $type = $_POST['sort-type'] ?? 'ALL';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifyCsrfToken()) {
            // Jeton CSRF invalide
            require '../models/login/login.manager.php';
            disconnect();
        }
    }

    $recordset = searchAndFilterUsersArchived($search, $type, $orderBy, $direction);

    $title = 'Liste des utilisateurs';

    $cssFiles =
        [
            '/css/user/user-style.css',
            '/css/generic/main-container.css',
            '/css/generic/table-responsive.css',
            '/css/generic/filter.css'
        ];
    $config = loadLayoutConfig();
    $template = '../views/user-archive/index.html.php';
    require '../views/layouts/layout.html.php';
}

