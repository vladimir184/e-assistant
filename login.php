<?php

if (!empty($_GET['login']) && !empty($_GET['password'])) {
	include __DIR__ . '/system/database.php';
	
	$login = $mysqli->real_escape_string(strtolower(trim($_GET['login'])));
	$password = $mysqli->real_escape_string($_GET['password']);

	$result = $mysqli->query("SELECT `user_id` FROM `users` WHERE `login`='" . $login . "' AND `password`='" . $password . "' LIMIT 1");

	if ($result->num_rows != 1) {
		echo '�������� ����� �/��� ������';
	} else {
		session_start();
		session_unset();
		session_regenerate_id();
		
		$_SESSION['login'] = $login;
		$_SESSION['password'] = $password;
		
		$user_id = $mysqli->real_escape_string($result->fetch_row()[0]);
		$result->free();

		$mysqli->query("DELETE FROM `sessions` WHERE `user_id`='" . $user_id . "'");
		$mysqli->query("INSERT INTO `sessions` (`session_id`, `user_id`, `php_session_id`, `expires`) VALUES (NULL, '" . $user_id . "', '" . $mysqli->real_escape_string(session_id()) . "', NOW() + INTERVAL 60 MINUTE)");
	
		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');
	}
}







?>