<?php
session_start();
echo <<<EOT
 <html>
	 <head>	 
		 <script src='../js/jquery.js'></script>
		 <script src='../js/container_load.js'></script>
		 <link rel='stylesheet' href='../css/frontend.css'>
	 </head>
	 <body>
		 <div id='container'>
			<div class='block'>
				<span id='storyscroll'>
				 Once upon a time long ago, on a tiny island country far, far, away, there lived an ancient wise man that
			had a vision that one day, in the not quite distant future, a young warrior would rise up and dominate 
			the world. It was foretold that this person would, once and for all, either unify or destroy all martial arts 
			as we know them.
				<h2>
					Are you the warrior of destiny? 
					Will you conquer the darkness or give in to it? 
					Destiny awaits your answer.
				</h2>

				<div align="center"><button id='storybutton' onclick='goPage("test_screen")'>Find Your Path</button></div>
				</span>

			</div>
		 </div>
	 </body>
 <html>
EOT
?>