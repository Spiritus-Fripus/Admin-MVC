<?php

function formLogin()
{
    $title = "LOGIN";
    $template = '../views/login/form-login.html.php';
    require '../views/layout.html.php';

    if (isset($_POST['send'])) {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require '../models/login.manager.php';
            connect();
        } else {
            echo "Veuillez remplir tous les champs.";
        }
    }
}
