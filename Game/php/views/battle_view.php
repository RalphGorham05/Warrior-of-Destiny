<?php
session_start();
if(!isset($_SESSION['userName']) || trim($_SESSION['userName']) == null)
{
	header("Location: ../index.php");
}

//echo $_GET['continent_id'];

echo <<<EOT
	<html>
		<head>		
			<script src='../../js/jquery.js'></script>
			<script src='../../js/battle_view.js'></script>
			<link href='../../css/battle_view.css' rel='stylesheet' type='text/css'>
		<head>
		
		<body onload="startFight({$_GET['continent_id']})">
			<div id="container">
				<p><font color='white'>Logged in as:</font> <font color='red'>{$_SESSION['userName']}</font></p>
				<table id="tbl_main" border="1">
					<tr>
						<th id="title" colspan="100%"><h1>Defeat your opponent!</h1></th>
					</tr>
					<tr>
						<td class="tbl_status_display">
							<table class="status_display" border="1">
								<tr>
									<th id="disp_npc_name_stat" colspan="100%"></th>
								</tr>
								<tr>
									<td><label>HP</label></td>
									<td id="display_npc_hp"></td>
								</tr>
								<tr>
									<td><label>AP</label></td>
									<td id="display_npc_ap"></td>
								</tr>
							</table>
						</td>
						
						<td>
							<div id="enemy_position" align="center">								
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="player_position" align="center">
							</div>
						</td>
						
						<td class="tbl_status_display">
							<table class="status_display" border="1">
								<tr>
									<th id="disp_player_name_stat" colspan="100%"></th>
								</tr>
								<tr>
									<td><label>HP</label></td>
									<td id="display_user_hp"></td>
								</tr>
								<tr>
									<td><label>AP</label></td>
									<td id="display_user_ap"></td>
								</tr>
							</table>
						</td>
					</tr>
					
					<input id="user_attack_1_id" type="hidden"></input>
					<input id="user_attack_2_id" type="hidden"></input>
					<input id="user_attack_3_id" type="hidden"></input>
					
					<tr>
						<td class="tbl_console" colspan="100%">
							<table width="100%" height="200px">
								<tr>
									<td width="25%">
										<table border="1" width="100%" height="100%">
											<tr><th colspan="100%">Choose an attack</th><tr>
											<tr><th>Name</th><th>Cost</th></tr>
											<tr><td><button id="user_attack_1_name" onclick="userAttack(document.getElementById('user_attack_1_id').value)"></button></td><td id="user_attack_1_ap"></td></tr>
											<tr><td><button id="user_attack_2_name" onclick="userAttack(document.getElementById('user_attack_2_id').value)"></button></td><td id="user_attack_2_ap"></td></tr>
											<tr><td><button id="user_attack_3_name" onclick="userAttack(document.getElementById('user_attack_3_id').value)"></button></td><td id="user_attack_3_ap"></td></tr>
										</table>
									</td>

									<td id="text_console">
										<ul id="battle_text">
										</ul>						
									</td>
									
									<td width="25%">
										<table  border="1" width="100%" height="100%">
											<tr>
												<th id="disp_player_name_inv" colspan="100%"></th>
											</tr>
											<tr>
												<td id="ptn1" align="center"><img height="50px" width="50px" src="../../images/potions/health_potion.png"/></td>
												<td id="ptn2" align="center"><img height="50px" width="50px" src="../../images/potions/health_potion.png"/></td>
												<td id="ptn3" align="center"><img height="50px" width="50px" src="../../images/potions/health_potion.png"/></td>
												<td id="ptn4" align="center"><img height="50px" width="50px" src="../../images/potions/health_potion.png"/></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</body>
	</html>
EOT

?>