<?php

function formLoginAction()
{
    $title = "LOGIN MNS";
    require '../views/home/login/index-login.html.php';
    $type_user = '';
    require '../models/login/login.manager.php';

    if (isset($_POST['send'])) {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $response = connect($_POST['email']);
            if ($response) {
                if (password_verify($_POST['password'], $response['user_password'])) {
                    switch ($response['user_type_id']) {
                        case 1:
                            $type_user = 'admin';
                            break;
                        case 2:
                            $type_user = 'teacher';
                            break;
                        case 3:
                            $type_user = 'student';
                            break;
                    }
                    $_SESSION['user_type'] = $type_user;
                    $_SESSION['user_mail'] = $_POST['email'];
                    header("Location: ?controller=$type_user&action=index");
                    exit();
                }
            }
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
