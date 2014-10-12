<?php

include 'system/config.php';
include 'system/database.php';
include 'system/auth.php';

// Если запрошено действие, а не страница
if (!empty($_GET['action']) && !empty($_GET['contact'])) {

	$action = $_GET['action'];
	$contact = (int) $_GET['contact'];

	switch ($_GET['action']) {
		// Если необходимо обновить чат
		case 'update': {
/*			$result = $mysqli->query("SELECT `passports`.`surname`, `passports`.`name`, `messages`.`text`, `messages`.`date_sent`, `messages`.`date_read`
											FROM `passports`, `messages`
											WHERE `messages`.`user_id_from` <> `messages`.`user_id_to`
											AND `messages`.`date_read` IS NULL
											AND `messages`.`user_id_from` = " . $contact . "
											AND `messages`.`user_id_to` = " . (int) $_SESSION['id'] . "
											AND `messages`.`user_id_from` = `passports`.`user_id`
											ORDER BY `date_sent` ASC");
											
			$mysqli->query("UPDATE `messages`
								SET `date_read` = NOW()
								WHERE `date_read` IS NULL
								AND `user_id_from` = " . $contact . "
								AND `user_id_to` = " . (int) $_SESSION['id']);
											
			echo json_encode($result->fetch_all(MYSQLI_ASSOC));
			$result->free();*/
			$result = $mysqli->query("SELECT `passports`.`surname`, `passports`.`name`, `messages`.`text`, `messages`.`date_sent`, `messages`.`date_read`
											FROM `passports`, `messages`
											WHERE `messages`.`user_id_from` <> `messages`.`user_id_to`
											AND `messages`.`user_id_from` IN (" . $contact . "," . (int) $_SESSION['id'] . ")
											AND `messages`.`user_id_to` IN (" . $contact . "," . (int) $_SESSION['id'] . ")
											AND `messages`.`user_id_from` = `passports`.`user_id`
											ORDER BY `date_sent` ASC");								

			$mysqli->query("UPDATE `messages`
					SET `date_read` = NOW()
					WHERE `date_read` IS NULL
					AND `user_id_from` = " . $contact . "
					AND `user_id_to` = " . (int) $_SESSION['id']);

			echo json_encode($result->fetch_all(MYSQLI_ASSOC));
			$result->free();
		}
		// Если необходимо отправить сообщение
		case 'send': {
			if (!empty($_POST['message'])) {
				$mysqli->query("INSERT INTO `messages` (`message_id`, `user_id_from`, `user_id_to`, `text`, `date_sent`, `date_read`)
									VALUES (NULL, " . (int) $_SESSION['id'] . ", " . $contact . ", '" . $mysqli->real_escape_string(htmlspecialchars($_POST['message'])) . "', NOW(), NULL)");
			}
		}
	}

// Если запрошена страница, а не действие
} else {

	// Получение списка пользователей
	$result = $mysqli->query("SELECT `passports`.`user_id`,`passports`.`surname`,`passports`.`name`
									FROM `passports`
									ORDER BY `surname` ASC, `name` ASC");

	$users = $result->fetch_all(MYSQLI_ASSOC);
	$result->free();

	// Определение онлайн-статуса пользователей *начало
	foreach ($users as &$data) {
		$result = $mysqli->query("SELECT `session_id`
							FROM `sessions`
							WHERE `user_id` = " . (int) $data['user_id'] . "
							AND `expires` > NOW()
							LIMIT 1");

		if ($result->num_rows == 1) {
			$data['status'] = 'online';
		} else {
			$data['status'] = 'offline';
		}
		$result->free();
	}

	unset($data); // Определение онлайн-статуса пользователей *конец

	if (!empty($_GET['contact'])) {
		$contact = (int) $_GET['contact'];
		
		// Получение всех сообщений
		$result = $mysqli->query("SELECT `passports`.`surname`, `passports`.`name`, `messages`.`text`, `messages`.`date_sent`, `messages`.`date_read`
										FROM `passports`, `messages`
										WHERE `messages`.`user_id_from` <> `messages`.`user_id_to`
										AND `messages`.`user_id_from` IN (" . $contact . "," . (int) $_SESSION['id'] . ")
										AND `messages`.`user_id_to` IN (" . $contact . "," . (int) $_SESSION['id'] . ")
										AND `messages`.`user_id_from` = `passports`.`user_id`
										ORDER BY `date_sent` ASC");								

		$messages = $result->fetch_all(MYSQLI_ASSOC);
		$result->free();
		
		// Получение данных о собеседнике
		$result = $mysqli->query("SELECT `surname`, `name`
										FROM `passports`
										WHERE `user_id` = " . $contact . "
										LIMIT 1");
										
		$contact_info = $result->fetch_assoc();
		$result->free();
		
		$result = $mysqli->query("SELECT `expires`
										FROM `sessions`
										WHERE `expires` > NOW()
										AND `user_id` = " . $contact . "
										LIMIT 1");
										
		if ($result->num_rows == 1) {
			$contact_info['status'] = 'online';
		} else {
			$contact_info['status'] = 'offline';
		}
		$result->free();
		
		include 'view/chat.php';
	}

}