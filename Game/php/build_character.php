<?php
session_start();
include_once "db_conn.php";

$action = trim($_REQUEST["action"]);
$userName = trim($_SESSION["userName"]);
if(!isset($action) || !isset($userName))
{
	die("The request was empty!");
}
else
{
	$characterTypeId = (int) (trim($_REQUEST["characterType"]));
	$sql = "SELECT * FROM base_character WHERE character_type_id = {$characterTypeId};";
	if ($result = $db->query($sql)) 
	{
		if($result->num_rows > 1 || $result->num_rows < 1)
		{
			die("There is an issue with the data in the base_character table. (too many or too few rows returned from query)");
		}
		else
		{	
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$hp = $row["hp"];
			$ap = $row["ap"];
			//these are default attributes from base character
			/*
			$speed = $row["speed"];
			$strength = $row["strength"];
			$luck = $row["luck"];
			$intelligence = $row["intelligence"];
			$chi = $row["chi"];
			$stealth = $row["stealth"];
			*/

			//these are the custom attributes the user selected passed from javascript
			$speed = $_REQUEST["speed"];
			$strength = $_REQUEST["strength"];
			$luck = $_REQUEST["luck"];
			$intelligence = $_REQUEST["intelligence"];
			$chi = $_REQUEST["chi"];
			$stealth = $_REQUEST["stealth"];
			
			$result->close(); //free the result set
			
			$sql = "select bc.character_type_desc, pca.* from playable_character_attack pca inner join base_character bc on pca.character_type_id = bc.character_type_id where bc.character_type_id = {$characterTypeId} and upper(pca.unique_flg) = 'Y' order by pca.damage asc, pca.ap_cost asc limit 3;";
			if ($result = $db->query($sql))
			{
				$startAttack = array();
				$i = 0;
				while($row = $result->fetch_array(MYSQLI_ASSOC))
				{
					$startAttack[$i] = (int) $row["attack_id"];
					$i++;
				}
					
				$insertUserCharacterSql = "INSERT INTO user_character (user_id, character_type_id, hp, ap, speed, strength, luck, intelligence, chi, stealth, attack_id_1, attack_id_2, attack_id_3) VALUES('{$userName}', {$characterTypeId}, {$hp}, {$ap}, {$speed}, {$strength}, {$luck}, {$intelligence}, {$chi}, {$stealth}, {$startAttack[0]}, {$startAttack[1]}, {$startAttack[2]});";
				$result->close(); //free the result set
				$result = $db->query($insertUserCharacterSql);
				if($result)
				{
					echo "success";
					//header('Location: views/choose_location.php');
				}
				else
				{
					echo $db->error;
				}		
			}
		}
	}
	else
	{
		echo $db->error;
	}
}
?>