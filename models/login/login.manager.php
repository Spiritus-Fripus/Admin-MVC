<?php

function connect($email, $password)
{
    require "../config/connect.php";

    $type_user = 0;

    $sql = "SELECT user_password ,user_mail, user_type_id FROM table_user WHERE user_mail = :mail";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("mail", $email);
    $stmt->execute();
    $response = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifie si des résultats ont été retournés
    if ($response) {
        // vérifie si existe dans la bdd et compare avec les mots de passes hashés avec password_hash('', PASSWORD_DEFAULT)
        if (password_verify($password, $response['user_password'])) {
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
}


function disconnect()
{
    $_SESSION['user_mail'] = '';
    $_SESSION['user_type'] = '';
    session_destroy();
    header('Location: /');
    exit();
}
