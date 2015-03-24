<?php
session_start();
if(isset($_SESSION['userName']))
	session_destroy();
echo <<<EOT
<html>
	<head>
		<link rel="stylesheet" href="../css/frontend.css">
		<script src='../js/jquery.js'></script>
		<script src="../js/container_load.js"></script>
		<script src="../js/clientsideValidation.js"></script>
		
	</head>
	<body onload='fetchPage("home")'>
		<div id="header">
			<div align="center">Warrior of Destiny</div>
		</div>
		<div id="main_container">
		</div>
	</body>
</html>

EOT
?>