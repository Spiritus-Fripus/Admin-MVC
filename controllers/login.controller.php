<?php
/**
 * @throws \Random\RandomException
 */
function formLoginAction(): void
{
    // Commence la mise en mémoire tampon de sortie
    ob_start();

    // Définition du titre et inclusion du fichier de vue
    $title = "LOGIN MNS";
    $cssFile = 'css/generic/login-style.css';
    require '../views/login/index-login.html.php';
    require '../config/config.php';
    $type_user = '';

    if (isset($_POST['send'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require '../models/login/login.manager.php';
            $response = connect($_POST['email']);
            if ($response) {
                if (password_verify($_POST['password'], $response['user_password'])) {
                    $type_user = $response['user_type_name'];
                    // Stocke le type d'utilisateur, son id et l'email dans la session
                    $_SESSION['user_type'] = $type_user;
                    $_SESSION['user_mail'] = $_POST['email'];
                    $_SESSION['user_id'] = $response['user_id'];
                    // Génère un jeton CSRF de 32 octets et le stocke le jeton csrf dans la session pour les formulaires
                    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

                    // Termine la mise en mémoire tampon de sortie et nettoie le tampon
                    ob_end_clean();

                    // Redirige vers l'index de l'utilisateur connecté
                    header("Location: ?controller=$type_user&action=index");
//                    switch ($type_user) {
//                        case 'admin':
//                            header("Location: /admin/index");
//                            break;
//                        case 'manager':
//                            header("Location: /manager/index");
//                            break;
//                        case 'student':
//                            header("Location: /student/index");
//                            break;
//                        default:
//                            // Redirection par défaut ou gestion de l'erreur
//                            header("Location: /");
//                            break;
//                    }
                    exit();
                }
            }
        }
    }
    // Termine la mise en mémoire tampon de sortie et envoie le contenu du tampon
    ob_end_flush();
}

function logoutAction(): void
{
    require '../models/login/login.manager.php';
    disconnect();
}
