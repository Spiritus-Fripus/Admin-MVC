<?php

function formLoginAction()
{
    $title = "LOGIN MNS";
    require '../views/home/index-login.html.php';

    if (isset($_POST['send'])) {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require '../models/login.manager.php';
            connect();
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }
}
