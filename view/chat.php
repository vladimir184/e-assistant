<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<link rel="stylesheet" href="view/styles.css">
</head>
<body>
	<div class="window">
		<div class="header">Мастер Йода <input type="radio" name="online" disabled><label for=""><span></span></label></div>
		<div class="lsidebar">
			<div class="people">Участники</div>
			<table class="members">
<?php

foreach ($users as $user) {
	echo '
						<tr>
							<td class="memberName"><a href="#">' . $user[1] . ' ' . $user[2] . '</a></td>
							<td class="memberStatus"><input type="radio" name="' . $user[3] . '" disabled><label for=""><span></span></label></td>
						</tr>';
}

?>
			</table>	
		</div>
		<div class="messages">
			<div class="chatWindow">
				<div class="wrapper">
					<div class="msgLeft"></div>
					<div class="msgRight"></div>
				</div>
			</div>
			<div class="text">
				<div class="innerarea">
					<textarea placeholder="Введите сообщение.." class="area"></textarea>
					<table class="messageButtons">
						<tr>
							<td>Отправить</td>
						</tr>
						<tr>
							<td>Прикрепить</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>