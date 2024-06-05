<?php

function formLoginAction()
{
    // Commence la mise en mémoire tampon de sortie
    ob_start();

    // Définition du titre et inclusion du fichier de vue
    $title = "LOGIN MNS";
    $cssFile = 'css/login-style.css';
    require '../views/login/index-login.html.php';
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
                    // Stocke le type d'utilisateur, son id et l'email dans la session
                    $_SESSION['user_type'] = $type_user;
                    $_SESSION['user_mail'] = $_POST['email'];
                    $_SESSION['user_id'] = $response['user_id'];

                    // Termine la mise en mémoire tampon de sortie et nettoie le tampon
                    ob_end_clean();

                    // Redirige vers l'index de l'utilisateur connecté
                    header("Location: ?controller=$type_user&action=index");
                    exit();
                }
            }
        }
    }
    // Termine la mise en mémoire tampon de sortie et envoie le contenu du tampon
    ob_end_flush();
}

function logoutAction()
{
    require '../models/login/login.manager.php';
    disconnect();
}
