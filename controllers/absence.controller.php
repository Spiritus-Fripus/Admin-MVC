<?php

function loadConfig()
{
    return include '../config/layout-config.php';
}

function viewandaddAbsence()
{
    require_once '../models/absence.manager.php';
}
