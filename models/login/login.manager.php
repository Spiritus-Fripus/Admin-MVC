<?php

require_once '../config/connect.php';

function connect($email): mixed
{
	$db = connectToDatabase();
	$sql = "SELECT table_user.user_password ,table_user.user_mail, table_user.user_type_id, user_id, table_user_type.user_type_id, table_user_type.user_type_name
	FROM table_user 
	JOIN table_user_type
	ON table_user.user_type_id = table_user_type.user_type_id
	WHERE table_user.user_mail = :mail ";
	$stmt = $db->prepare($sql);
	$stmt->bindValue("mail", $email);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
}


function disconnect(): never
{
	$_SESSION['user_mail'] = '';
	$_SESSION['user_type'] = '';
	$_SESSION['user_id'] = '';
	$_SESSION['csrf_token'] = '';
	session_destroy();
	header('Location: /');
	exit();
}
