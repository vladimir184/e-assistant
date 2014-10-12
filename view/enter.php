<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Вход</title>
		<link rel="stylesheet" href="view/styles.css">
	</head>
	<body class="enterbody">
		<div class="enter">
			<h1>E-Assistant</h1>
			<form method="post" action="login.php">
				<table>
					<tr>
						<td class="entertext" colspan="2">Логин</td>							
					</tr>
					<tr class="inputTd">
						<td class="icon1">
							<img src="view/images/icon.png">
						</td>
						<td class="relative">
							<input name="login" type="text" class="" autofocus required>
<?php

if (!empty($error)) {
	echo '<div class="error1"><div class="rel">' . htmlspecialchars($error) . '</div></div>';
}

?>
						</td>
					</tr>
					<tr>
						<td class="entertext" colspan="2">Пароль</td>
					</tr>
					<tr class="inputTd">
						<td class="icon2">
							<img src="view/images/password.png">
						</td>
						<td>
							<input name="password" type="password" required>
						</td>
					</tr>
				</table>
				<div class="checkbox"><input type="checkbox" class="enterCheck"><span>Запомнить</span></div>
				<input type="submit" value="Войти">
			</form>
		</div>
	</body>
</html>