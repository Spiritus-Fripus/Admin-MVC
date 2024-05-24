<?php

function formLoginAction()
{
    // Start output buffering
    ob_start();

    $title = "LOGIN MNS";
    require '../views/home/index-login.html.php';
    $type_user = '';

    if (isset($_POST['send'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require '../models/login/login.manager.php';
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
                    // Clear output buffer and send headers
                    ob_end_clean();
                    header("Location: ?controller=$type_user&action=index");
                    exit();
                }
            }
        }
    }

    // Send output buffer content if there's any
    ob_end_flush();
}

function logoutAction()
{
    require '../models/login/login.manager.php';
    disconnect();
}
