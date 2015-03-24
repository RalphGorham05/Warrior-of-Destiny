<?php
	session_start();
	include_once "../db_conn.php";
	$userName =  trim($_POST["userName"]);
	$password =  trim($_POST["password"]);
	
	if(isset($userName) && isset($password))
	{		
		if ($result = $db->query("SELECT * FROM user WHERE user_id = '{$userName}';")) 
		{
			if($result->num_rows === 0)
			{
				$insertUserSql = "INSERT INTO user(password, user_id) VALUES('{$password}', '{$userName}');";
				if($db->query($insertUserSql))
				{
					$_SESSION['userName'] = $userName;
					//header("Location: ../views/build_character.php");
					header("Location: ../start_story.php");
				}	
			}
			else if($result->num_rows === 1)
			{
				while($row = $result->fetch_array(MYSQLI_ASSOC))
				{
    				echo "Sorry, <font color='red'>{$row['user_id']}</font> is already a registered user!!";
				}
			}
			else
			{
				
			}
    		/* free result set */
    		$result->close();
		}
		
		
	}
?>

