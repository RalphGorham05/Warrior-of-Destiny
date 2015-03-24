<?php
session_start();
if(!isset($_SESSION['userName']))
{
	header("Location: ../index.php");
}
if(!isset($_SESSION['wins']))
	$_SESSION['wins'] = 0;
if(!isset($_SESSION['losses']))
	$_SESSION['losses'] = 0;
echo <<<EOT
 	<html>
 		<head>
			<script src='../../js/jquery.js'></script>
			<script src='../../js/choose_location.js'></script>
			<link href='../../css/choose_location.css' rel='stylesheet' type='text/css'>
		</head>
	
		<body onload="showDefaultImg()">
			<div id="container">
				<p>Logged in as: <font color='red'>{$_SESSION['userName']}</font></p>
				<table><tr><td><font color='green'>Total Wins: </font>{$_SESSION['wins']}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><font color='red'>Total Losses: </font>{$_SESSION['losses']}</td></tr></table>
				<table id='tbl_main' border='1'>
					<tr>
						<th colspan='100%'><font color='white'><h1>Which continent shall you conquer?</h1></font></th>
					</tr>
					
					<tr>
						<td class='narrow_td'>
							<div align='left'>
								<ul>
									<li id='africa' onmouseover='displayImg(this.id)' onclick='directToFight(4)'>Africa</li>
									<li id='australia' onmouseover='displayImg(this.id)' onclick='directToFight(2)'>Australia</li>
									<li id='antartica' onmouseover='displayImg(this.id)' onclick='directToFight(1)'>Antartica</li>
									<li id='asia' onmouseover='displayImg(this.id)' onclick='directToFight(3)'>Asia</li>	
									<li id='europe' onmouseover='displayImg(this.id)' onclick='directToFight(5)'>Europe</li>	
									<li id='north_america' onmouseover='displayImg(this.id)' onclick='directToFight(6)'>North America</li>
									<li id='south_america' onmouseover='displayImg(this.id)' onclick='directToFight(7)'>South America</li>
								</ul>
							</div>
						</td>
						
						<td class='wide_td'>
							<div id='location_img'></div>
						</td>
					</tr>
				</table>
			</div>
		</body>
 </html>
EOT
?>