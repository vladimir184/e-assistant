<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<title>Chat</title>
		<link rel="stylesheet" href="styles.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	

	</head>

	<body>

			<div class="window">
				<div class="header">Мастер Йода <input type="radio" name="online" disabled><label for=""><span></span></label>
	        </div>
			
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
				<!--<?php

				foreach ($users as $user) {
					echo '
										<tr>
											<td class="memberName"><a href="#">' . $user[1] . ' ' . $user[2] . '</a></td>
											<td class="memberStatus"><input type="radio" name="' . $user[3] . '" disabled><label for=""><span></span></label></td>
										</tr>';
				}

				?>-->
				</table>	
			</div>

			<div class="messages">
				<div class="chatWindow">
				<div class="space"></div>
					<div class="wrapper">

						<div class="msgLeft">
							<div class="name">
								<span class="msgName">Артём Мокренко</span>
								<span class="msgTime">14:53</span>
								<span  class="mstTime2">Прочитано: 14:54</span>
							</div>
							<div class="mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam augue, pellentesque id lorem quis, aliquam commodo elit. Aenean sed posuere lectus. Praesent sagittis purus nec purus iaculis facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer nec tortor odio.</div>
						</div>

						<div class="msgLeft">
							<div class="name">
								<span class="msgName">Артём Мокренко</span>
								<span class="msgTime">14:53</span>
								<span  class="mstTime2">Прочитано: 14:54</span>
							</div>
							<div class="mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam augue, pellentesque id lorem quis, aliquam commodo elit. Aenean sed posuere lectus. Praesent sagittis purus nec purus iaculis facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer nec tortor odio.</div>
						</div>
						
						<div class="msgLeft">
							<div class="name">
								<span class="msgName">Артём Мокренко</span>
								<span class="msgTime">14:53</span>
								<span  class="mstTime2">Прочитано: 14:54</span>
							</div>
							<div class="mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam augue, pellentesque id lorem quis, aliquam commodo elit. Aenean sed posuere lectus. Praesent sagittis purus nec purus iaculis facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer nec tortor odio.</div>
						</div>
							<div class="msgLeft">
							<div class="name">
								<span class="msgName">Артём Мокренко</span>
								<span class="msgTime">14:53</span>
								<span  class="mstTime2">Прочитано: 14:54</span>
							</div>
							<div class="mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam augue, pellentesque id lorem quis, aliquam commodo elit. Aenean sed posuere lectus. Praesent sagittis purus nec purus iaculis facilisis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer nec tortor odio.</div>
						</div>
						
						
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