<?php
	include_once "../db_conn.php";
	session_start();
	$userName =  trim($_POST["userName"]);
	$password =  trim($_POST["password"]);

	if ($result = $db->query("SELECT * FROM user WHERE user_id = '{$userName}';")) 
	{
		//user is registered
		if($result->num_rows === 1)
		{
			$datarow = $result->fetch_array(MYSQLI_ASSOC); 
			//correct pw
			if($datarow["password"] == $password)
			{
				$_SESSION['userName'] = $userName;
				header("Location: ../views/choose_location.php");
			}
			//wrong pw
			else
			{			
				die("Wrong password. Please try again.");
			}
		}
		//user is not registered
		else if($result->num_rows === 0)
		{				
			header("Location: ../index.php");
		}		
	}
	else
	{
		die("Username and password must be set!");
	}
?>

