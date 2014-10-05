<?php

session_start();

$result = $mysqli->query("SELECT `session_id` FROM `sessions` WHERE `php_session_id` = '" . $mysqli->real_escape_string(session_id()) . "' AND `user_id` = " . (int) $_SESSION['id'] . " AND `expires` > NOW()");

if ($result->num_rows == 0) {
	$result->free();

	session_unset();

	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();

		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	session_destroy();

	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
} else {
	$mysqli->query("UPDATE `sessions`
						SET `expires` = NOW() + INTERVAL 60 MINUTE
						WHERE `user_id` = " . (int) $_SESSION['id'] . "
						LIMIT 1");
}

?>