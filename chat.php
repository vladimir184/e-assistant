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

if (!empty($_GET['contact']) && !empty($_POST['message_text'])) {
	$mysqli->query("INSERT INTO `messages` (`text`, `date_sent`) VALUES ('" . $mysqli->real_escape_string($_POST['message_text']) . "', NOW())");
	$mysqli->query("INSERT INTO `addressees` (`addressee_user_id`, `addresser_user_id`) VALUES (" . (int) $_GET['contact'] . ", ". (int) $_SESSION['id'] . ")");

/* 	if (!empty($_FILES)) {
		foreach ($_FILES as $attachment) {
			if ($attachment['error'] == UPLOAD_ERR_OK) {
				if (move_uploaded_file($file['name']. )) {
					
				}
			}
		}
	} */
}

include 'view/chat.php';