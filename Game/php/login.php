<?php
echo <<<EOT
 <html>

 	<head>
		<script src='../js/jquery.js'></script>
 		<script src='../js/container_load.js'></script>
		<link rel='stylesheet' href='../css/login.css'>
 	</head>

	<body>
 		<div id='corner_btn'>
			<button onclick='fetchPage("home")'>Back to Main Menu</button>
		</div>

 		<div id='login_container'>
			<form id='login_form' action='login_scripts/login.php' method='POST'>
				<div class='block'>
					<table>
						<th colspan='100%'><h2>Login to Continue Playing!</h2></th>
							<tr>
								<td><label>Username: </label></td>
								<td><input id='loginId' name='userName' type='text'/></td>
							</tr>
							<tr>
								<td><label>Password: </label></td>
								<td><input id='loginPw' name='password' type='password'/></td>
							</tr>
					</table>
				</div>
				
				<div align='center'>
					<button onclick='clearInputs()'>Clear</button>
					<input id='sbmt_login' type='submit' value='Log In'/>
				</div>
			</form>
		</div>
	</body>
 <html>

EOT;
?>


	
	
		
		
	
	
		
		
	
