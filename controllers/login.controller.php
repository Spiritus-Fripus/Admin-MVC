<?php

function formLoginAction()
{
    $title = "LOGIN MNS";
    require '../views/home/login/index-login.html.php';

    if (isset($_POST['send'])) {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require '../models/login/login.manager.php';
            connect($_POST['email'], $_POST['password']);
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }
}

function logoutAction()
{
    require '../models/login/login.manager.php';
    disconnect();
}
