<?php

if (!empty($_POST['login']) && !empty($_POST['password'])) {
	include 'system/config.php';
	include 'system/database.php';
	
	$login = $mysqli->real_escape_string(strtolower(trim($_POST['login'])));
	$password = $mysqli->real_escape_string($_POST['password']);

	$result = $mysqli->query("SELECT `user_id` FROM `users` WHERE `login` = '" . $login . "' AND `password` = SHA1('" . $password . "') LIMIT 1");

	if ($result->num_rows != 1) {
		$error = 'Неверный логин и/или пароль';
	} else {
		session_start();
		session_unset();
		session_regenerate_id();
		
		$_SESSION['login'] = $login;
		$_SESSION['password'] = $password;
		
		$user_id = $mysqli->real_escape_string($result->fetch_row()[0]);
		
		$_SESSION['id'] = $user_id;
		
		$result->free();

		$mysqli->query("DELETE FROM `sessions` WHERE `user_id`='" . $user_id . "'");
		$mysqli->query("INSERT INTO `sessions` (`session_id`, `user_id`, `php_session_id`, `expires`) VALUES (NULL, '" . $user_id . "', '" . $mysqli->real_escape_string(session_id()) . "', NOW() + INTERVAL 60 MINUTE)");
	
		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
	}
}

include 'view/enter.php';

?>