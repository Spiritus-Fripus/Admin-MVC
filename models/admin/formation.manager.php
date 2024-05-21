<?php

require '../config/connect.php';

function getAllFormation()
{
    require './config/connect.php';
    $sql = 'SELECT * FROM table_formation';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
