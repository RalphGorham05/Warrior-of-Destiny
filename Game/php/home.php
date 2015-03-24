<?php
echo <<<EOT
 <html>

 	<head>
		<link rel='stylesheet' href='../css/home.css'>
 		<script src='../js/container_load.js'></script>
		<script src='../js/jquery.js'></script>
 	</head>
	<body>
		<audio autoplay>
  			<source src="../audio/test.mp3" type="audio/mpeg">
  			<source src="horse.ogg" type="audio/ogg">
  			<embed height="50" width="100" src="../audio/test.mp3">
  			Your browser does not support this audio format.
		</audio>
		<div id='main_menu_container'>\n
			<div class='block'>\n
				<div align='center'><h1>Main Menu</h1></div>\n
 			<ul>\n
				<li align='center'><button onclick='fetchPage("register")'>Join the Warrior Ranks</button></li>\n
				<li align='center'><button onclick='fetchPage("login")'>Continue Saved Game</button></li>\n
				<li align='center'><button onclick='fetchPage("about_game")'>Help</button></li>\n
				<li align='center'><button onclick='fetchPage("game_complete")'>com</button></li>\n
 			</ul>\n
		</div>\n
		</div>\n
	</body>
 </html>
EOT

?>

