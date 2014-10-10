<?php

include 'system/config.php';
include 'system/database.php';
include 'system/auth.php';

$result = $mysqli->query("SELECT `passports`.`user_id`,`passports`.`surname`,`passports`.`name`
								FROM `passports`
								ORDER BY `surname` ASC, `name` ASC");

$users = $result->fetch_all();

$result->free();

foreach ($users as &$data) {
	$result = $mysqli->query("SELECT `session_id`
						FROM `sessions`
						WHERE `user_id` = " . (int) $data[0] . "
						AND `expires` > NOW()
						LIMIT 1");

	if ($result->num_rows == 0) {
		$data[] = 'offline';
	} else {
		$data[] = 'online';
	}
	
	$result->free();
}

unset($data);

if (!empty($_GET['contact'])) {
	$contact = (int) $_GET['contact'];
	
	$result = $mysqli->query("SELECT `addressees`.`addresser_user_id`,`messages`.`text`,`messages`.`date_sent`,`addressees`.`date_read`
									FROM `addressees`
									INNER JOIN `messages`
									ON `addressees`.`message_id` = `messages`.`message_id`
									WHERE `addressee_user_id` IN (" . (int) $_SESSION['id'] . ", " . $contact . ")
									AND `addresser_user_id` IN (" . (int) $_SESSION['id'] . ", " . $contact . ")
									AND `addressee_user_id` <> `addresser_user_id`
									ORDER BY `messages`.`date_sent` ASC");

	$messages = $result->fetch_all();
	$result->free();
}

if (!empty($_GET['contact'])) {
	$contact = (int) $_GET['contact'];
	
	$result = $mysqli->query("SELECT `passports`.`name`, `passports`.`surname`, `messages`.`text`, `messages`.`date_sent`, `messages`.`date_read`
									FROM `passports`, `messages`
									WHERE `messages`.`user_id_from` IN (" . (int) $_SESSION['id'] . ", " . $contact . ")
									AND `messages`.`user_id_to` IN (" . (int) $_SESSION['id'] . ", " . $contact . ")
									AND `messages`.`user_id_from` <> `messages`.`user_id_to`
									AND `passports`.`user_id` IN (" . (int) $_SESSION['id'] . ", " . $contact . ")");
}

include 'view/chat.php';