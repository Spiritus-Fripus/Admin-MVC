<?php

function index()
{
    require '../models/teacher.manager.php';
    $recordset = showInfo();
    $title = 'Teacher Connected';
    $template = '../views/teacher/index.html.php';
    require '../views/layout.html.php';
}
