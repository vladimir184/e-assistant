<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Чат</title>
		<link rel="stylesheet" href="view/styles.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			function chatUpdate() {
				var xmlhttp = new XMLHttpRequest();
				var url = document.URL + '&action=update';

				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						var messages = JSON.parse(xmlhttp.responseText), i;
						var wrapper = document.getElementsByClassName('wrapper')[0];
						wrapper.innerHTML = '';
						for (i = 0; i < messages.length; i++) {
							if (messages[i]['date_read'] === null) {
								messages[i]['date_read'] = 'Непрочитано';
							} else {
								messages[i]['date_read'] = 'Прочитано: ' + messages[i]['date_read'];
							}
							wrapper.innerHTML += ''
							+ '<div class="msgLeft">'
							+ '	<div class="name">'
							+ '		<span class="msgName">' + messages[i]['surname'] + ' ' + messages[i]['name'] +' </span>'
							+ '		<span class="msgTime">' + messages[i]['date_sent'] + '</span>'
							+ '		<span  class="mstTime2">' + messages[i]['date_read'] + '</span>'
							+ '	</div>'
							+ '	<div class="mess">' + messages[i]['text'] + '</div>'
							+ '</div>';
						}
					}
				}
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
			}
			
			function chatSend() {
				var xmlhttp = new XMLHttpRequest();
				var url = document.URL + '&action=send';
				var postMsg = 'message=' + document.getElementsByClassName('area')[0].value;

				document.getElementsByClassName('area')[0].value = '';

				xmlhttp.open("POST", url, true);
				xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
				xmlhttp.send(postMsg);
				
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						chatUpdate();
					}
				}
			}

			setInterval(chatUpdate, 1000);		
		</script>
	</head>
	<body>
		<div class="window">
			<div class="people">Участники</div>				
			<div class="header">
				<?=$contact_info['surname'].' '.$contact_info['name']?>&nbsp;<input type="radio" name="<?=$contact_info['status']?>" disabled>
				<label for="">
					<span></span>
				</label>
			</div>
			<div class="lsidebar">
				<table class="members">
<?php

foreach ($users as $user) {

echo '
					<tr>
						<td class="memberName"><a href="/chat.php?contact=' . $user['user_id'] . '">' . $user['surname'] . ' ' . $user['name'] . '</a></td>
						<td class="memberStatus"><input type="radio" name="' . $user['status'] . '" disabled>
							<label for="">
								<span></span>
							</label>
						</td>
					</tr>';
}
?>
				</table>	
			</div>
			<div class="messages">
				<div class="chatWindow">
					<div class="space"></div>
					<div class="wrapper">
<?php

foreach ($messages as $message) {

if (empty($message['date_read'])) {
	$message['date_read'] = 'Непрочитано';
} else {
	$message['date_read'] = 'Прочитано: ' . $message['date_read'];
}

echo '
						<div class="msgLeft">
							<div class="name">
								<span class="msgName">' . $message['surname'] . ' ' . $message['name'] . '</span>
								<span class="msgTime">' . $message['date_sent'] . '</span>
								<span  class="mstTime2">' . $message['date_read'] . '</span>
							</div>
							<div class="mess">' . $message['text'] . '</div>
						</div>';
}
?>
					</div>
				</div>
			</div>
			<div class="text">
				<div class="innerarea">
					<textarea placeholder="Введите сообщение.." class="area"></textarea>
					<table class="messageButtons">
						<tr>
							<td onClick="chatSend()">Отправить</td>
						</tr>
						<tr>
							<td>Прикрепить</td>
						</tr>
					</table>
				</div>
				<div class="kostil">	</div>
			</div>
		</div>
	</body>
</html>