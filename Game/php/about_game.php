<?php
echo <<<EOT
 <html>
 	<head>
 		<link rel='stylesheet' href='../css/about_game.css'>
 		<script src='../js/container_load.js'></script>
 		<script src='../js/jquery.js'></script>
 	</head>

 	<body>
 		<div id='corner_btn'><button onclick='fetchPage("home")'>Back to Main Menu</button></div>
		<div id='about_game_container'>
		<div align='center'><h1>About Warrior of Destiny</h1></div>
		<p><h2>Game Objective</h2></p>
 			<p>You choose your character based on whether you are good or evil.You must defeat each character in all the locations on each continent. Once you beat each character, you will then fight a boss character.
 			 If you beat the boss character, you will have conquered that continent. You can select another continent to conquer until you finish them all. After that, you fight
 			the Game boss to see if you are a true warrior of Destiny.</p>
		<p><h2>Game Controls</h2></p>
 			<p>You select a move based on your available AP. You have 4 potions in your inventory to choose from, which either restore some HP or AP.</p>
		<p><h2>Characters</h2></p>
 			<p>There are 8 playable characters in the game, 4 of which are good and 4 are evil. You can choose the characters based on test to determine whether 
 			you are a savior or destroyer.</p>
		</div>
 	</body>
 <html>
EOT
?>