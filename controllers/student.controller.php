<?php

function index()
{
    require '../models/student.manager.php';
    $recordset = showInfo();
    $title = 'Student Connected';
    $template = '../views/student/index.html.php';
    require '../views/layout.html.php';
}
