<?php

function connect()
{
    require "../config/connect.php";

    $type_user = 0;

    $sql = "SELECT user_password ,user_mail, user_type_id FROM table_user WHERE user_mail = :mail";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("mail", $_POST['email']);
    $stmt->execute();
    $response = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifie si des résultats ont été retournés
    if ($response) {
        // vérifie si existe dans la bdd et compare avec les mots de passes hashés avec password_hash('', PASSWORD_DEFAULT)
        if (password_verify($_POST['password'], $response['user_password'])) {
            switch ($response['user_type_id']) {
                case 1:
                    $type_user = 'admin';
                    header('Location: ?controller=admin&action=index');
                    break;
                case 2:
                    $type_user = 'teacher';
                    header('Location: ?controller=teacher&action=index');
                    break;
                case 3:
                    $type_user = 'student';
                    header('Location: ?controller=student&action=index');
                    break;
            }
            // debut de session et definition des variables de session
            session_start();
            $_SESSION['user_type'] = $type_user;
            $_SESSION['user_mail'] = $_POST['email'];
        }
    }
}
