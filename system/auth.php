<?php

session_start();

$result = $mysqli->query("SELECT `session_id` FROM `sessions` WHERE `php_session_id` = '" . $mysqli->real_escape_string(session_id()) . "' AND `expires` > NOW()");

if ($result->num_rows == 0) {
	$result->free();
	unset($result);

	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
}

?>