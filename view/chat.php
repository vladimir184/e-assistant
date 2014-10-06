<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="window">
		<div class="header">Мастер Йода <input type="radio" name="online" disabled><label for=""><span></span></label></div>
		<div class="lsidebar">
			<div class="people">Участники</div>
			<table class="members">
					<tr>
						<td class="memberName"><a href="#">Мастер Йода</a></td>
						<td class="memberStatus"><input type="radio" name="online" disabled><label for=""><span></span></label></td>
					</tr>
					<tr>
						<td class="memberName"><a href="#">Мастер Йода</a></td>
						<td class="memberStatus"><input type="radio" name="online" disabled><label for=""><span></span></label></td>
					</tr>
					<tr>
						<td class="memberName"><a href="#">Мастер Йода</a></td>
						<td class="memberStatus"><input type="radio" name="online" disabled><label for=""><span></span></label></td>
					</tr>
					<tr>
						<td class="memberName"><a href="#">Мастер Йода</a></td>
						<td class="memberStatus"><input type="radio" name="online" disabled><label for=""><span></span></label></td>
					</tr>
					<tr>
						<td class="memberName"><a href="#">Дарт Вейдер</a></td>
						<td class="memberStatus"><input type="radio" name="offline" disabled><label for=""><span></span></label></td>
					</tr>
					<tr>
						<td class="memberName"><a href="#">Дарт Вейдер</a></td>
						<td class="memberStatus"><input type="radio" name="offline" disabled><label for=""><span></span></label></td>
					</tr>
					<tr>
						<td class="memberName"><a href="#">Дарт Вейдер</a></td>
						<td class="memberStatus"><input type="radio" name="offline" disabled><label for=""><span></span></label></td>
					</tr>
					<tr>
						<td class="memberName"><a href="#">Дарт Вейдер</a></td>
						<td class="memberStatus"><input type="radio" name="offline" disabled><label for=""><span></span></label></td>
					</tr>
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