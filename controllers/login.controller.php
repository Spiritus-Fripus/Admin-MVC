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
                    //ob_end_clean() échouera sans un tampon de sortie actif démarré avec le drapeau PHP_OUTPUT_HANDLER_REMOVABLE.
                    //ob_end_clean() supprimera le contenu du tampon de sortie actif même s'il a été démarré sans le drapeau PHP_OUTPUT_HANDLER_CLEANABLE.
                    ob_end_clean();
                    header("Location: ?controller=$type_user&action=index");
                    exit();
                }
            }
        }
    }
    //ob_end_flush() échouera sans un tampon de sortie actif démarré avec le drapeau PHP_OUTPUT_HANDLER_REMOVABLE.
    //ob_end_flush() videra (enverra) la valeur de retour du gestionnaire de sortie même si le tampon de sortie actif a été démarré sans le drapeau PHP_OUTPUT_HANDLER_FLUSHABLE.
    ob_end_flush();
}

function logoutAction()
{
    require '../models/login/login.manager.php';
    disconnect();
}
