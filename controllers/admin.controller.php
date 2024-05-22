<?php

function index()
{
    require '../models/admin.manager.php';
    $recordset = showInfo();
    $title = 'Admin Connected';
    $template = '../views/admin/admin.html.php';
    require '../views/layouts/layout.html.php';
};
