<?php
session_start();
if(!isset($_SESSION['userName']) || trim($_SESSION['userName']) == null)
{
	header("Location: ../index.php");
}

echo <<<EOT

<html>
<head>
<link rel="stylesheet" href="css/gamecomplete.css" media="screen"/>
</head>
<body>
	<div id="CompleteContainer">
		<div id="completeTitle">
			<p>Congratulations, <font color='red'>{$_SESSION['userName']}</font></p>
		</div>

		<div id="completeText">
			<p>You have affirmed the prophecy and have become what destiny molded you to be. 
			You are the one true warrior that has long been foretold whom would arrive to conquer the martial universe. 
			Your name will continually  live in the pantheon of great warriors for all eternity and will be echoed forever in the hall of time. </p>
		</div>

		<li align='center'><button onclick='fetchPage(\"credits\")'>Credits</button></li>

	</div>

</body>
</html>

EOT
?>