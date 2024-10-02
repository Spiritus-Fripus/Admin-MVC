<?php
function formLoginAction(): void
{
    if (empty($_SESSION['csrf_token'])) :
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    endif;

    // Commence la mise en mémoire tampon de sortie
    ob_start();

    $title = "LOGIN MNS";
    $cssFile = 'css/generic/login-style.css';
    require '../views/login/index-login.html.php';
    require '../config/config.php';
    $type_user = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') :

        if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) :

            if (!empty($_POST['email']) && !empty($_POST['password'])) :
                require '../models/login/login.manager.php';
                $response = connect($_POST['email']);
                if ($response) :
                    if (password_verify($_POST['password'], $response['user_password'])):
                        $type_user = $response['user_type_name'];

                        // Stocke le type d'utilisateur, son id et l'email dans la session
                        $_SESSION['user_type'] = $type_user;
                        $_SESSION['user_mail'] = $_POST['email'];
                        $_SESSION['user_id'] = $response['user_id'];

                        // Regénère le jeton CSRF
                        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

                        // Termine la mise en mémoire tampon de sortie et nettoie le tampon
                        ob_end_clean();

                        // Redirige vers l'index de l'utilisateur connecté
                        header("Location: /$type_user");
                        exit();
                    endif;
                endif;
            else :
                // Erreur email / password
                echo "Email ou mot de passe incorrect.";
            endif;
        else :
            // Jeton CSRF invalide, gérer l'erreur
            die('Jeton CSRF invalide.');
        endif;
        // Termine la mise en mémoire tampon de sortie et envoie le contenu du tampon
        ob_end_flush();
    endif;
}
