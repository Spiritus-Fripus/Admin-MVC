<?php

require '../config/config.php';

function viewCandidate()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        addCandidate();
        //redirection vers page candidatures
        header("Location: ?controller=candidate&action=viewcandidate");
    }

    $cssFile = '/css/candidate-style.css';
    $template = '../views/candidate.html.php';
    require "../views/layouts/layout.html.php";
}
