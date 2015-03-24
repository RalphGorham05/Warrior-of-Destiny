<?php
echo <<<EOT
 <html>
 	<head>
		<script src='../js/jquery.js'></script>
 		<script src='../js/container_load.js'></script>
		<link rel='stylesheet' href='../css/register.css'>
 	</head>

	<body>
 		<div id='corner_btn'><button onclick='fetchPage("home")'>Back to Main Menu</button></div>

 		<div id='register_container'>
			<div class='block'>
			<form id='registration_form' action='login_scripts/register.php' method='POST'>		
			<table>
				<th colspan='100%'><h2>Get Registered!</h2></th>
					<tr>
						<td><label>Choose Username: </label></td>
						<td><input name='userName' type='text'/></td>
						<td colspan='35%'><div id='username_status'></div></td>
 					</tr>
 					<tr>
 						<td><label>Choose Password: </label></td>
 						<td><input name='password' type='password' id='pw_original' onkeyup='resetStatus()'/></td>
						<td colspan='35%'><div id='valid_pw'></div></td>
 					</tr>
 					<tr>
 						<td><label>Confirm Password: </label></td>
 						<td><input type='password' id='pw_confirmation'/ onkeyup='validateRegistration(document.getElementById("pw_original").value, this.value)' onfocus='validateRegistration(document.getElementById("pw_original").value, this.value)'></td>
						<td colspan='35%'><div id='pw_match_status'></div></td>
 					</tr>
 			</table>

			<div align='center'>
				<button onclick='clearInputs()'>Clear</button>
				<input type='submit' value='Register!'/>
            </div>
            </div>
 		</div>
 		</div>
	</body>
 </html>
EOT;
?>