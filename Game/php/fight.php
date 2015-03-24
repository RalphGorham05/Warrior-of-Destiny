<?php
	include_once('db_conn.php');
	include_once('./objects/Attack.php');
	//potions
	include_once('./objects/MajorHpPotion.php');
	//characters
	include_once('./objects/NpcCharacter.php');
	include_once('./objects/Monk.php');
	include_once('./objects/Ninja.php');
	include_once('./objects/Boxer.php');
	include_once('./objects/MMA.php');
	include_once('./objects/BJJ.php');
	include_once('./objects/Boxer.php');
	include_once('./objects/MuayThai.php');
	include_once('./objects/Sambo.php');

	session_start();
	$userName =  trim($_SESSION['userName']);
	$npc_type = null;
	$continent_enemy_count;

	if(isset($_REQUEST['continent_id']))
		$continent_id = $_REQUEST['continent_id'];
		$sql = "SELECT count(*) as count FROM npc_character npc inner join geography_city gc on gc.city_id=npc.city_id where gc.continent_id = {$continent_id}";
	if($result = $db->query($sql)) 
	{
		$datarow = $result->fetch_array(MYSQLI_ASSOC); 
		$continent_enemy_count=$datarow['count'];
	}

	$action = $_REQUEST['action'];		
	
	if($action != null)
	{
		$current_win_count=0;
		if($action == "start_fight")
		{
			$sql = "select win_count from user_character where user_id= '{$userName}'";
			if($result = $db->query($sql)) 
			{
				$datarow = $result->fetch_array(MYSQLI_ASSOC); 
				$current_win_count=$datarow['win_count'];
			}

			if ($current_win_count>$continent_enemy_count) 
			{
				$npc_type = "boss";
			}
			else
			{
				$npc_type = "grunt";
			}



			$_SESSION['user_turn_counter'] = 0;
			/////*PLAYABLE CHARACTER*/////	
			//get user character status and attributes, then create the character object
			$sql = "select bc.character_type_desc character_type_desc, uc.character_type_id character_type_id, uc.hp hp, uc.ap ap, uc.xp xp, uc.character_level level, uc.stealth stealth, uc.chi chi, uc.intelligence iq, uc.luck luck, uc.strength strength, uc.speed speed, uc.attack_id_1 attack_id_1, uc.attack_id_2 attack_id_2, uc.attack_id_3 attack_id_3 from user_character uc inner join base_character bc on uc.character_type_id = bc.character_type_id where uc.user_id = '{$userName}';";
			if($result = $db->query($sql)) 
			{
				if($result->num_rows === 1)
				{
					$datarow = $result->fetch_array(MYSQLI_ASSOC); 
					$className = trim($datarow['character_type_desc']);
					if(strtolower($className) == "muay thai")
						$className = "MuayThai";
					//Get this particular user character data:
					//stats
					$playerHp    = (int) $datarow['hp'];
					$playerAp    = (int) $datarow['ap'];
					$playerLevel = (int) $datarow['level'];
					$playerXp    = (int) $datarow['xp'];
					
					//attacks
					$playerAttacks = array();
					$playerAttacks['attack_id_1'] = (int) $datarow['attack_id_1'];
					$playerAttacks['attack_id_2'] = (int) $datarow['attack_id_2'];
					$playerAttacks['attack_id_3'] = (int) $datarow['attack_id_3'];

					//atributes
					$playerAttributes = array();
					$playerAttributes['stealth']  = (int) $datarow['stealth'];
					$playerAttributes['chi']      = (int) $datarow['chi'];
					$playerAttributes['iq']       = (int) $datarow['iq'];
					$playerAttributes['strength'] = (int) $datarow['strength'];
					$playerAttributes['speed']    = (int) $datarow['speed'];
					$playerAttributes['luck']     = (int) $datarow['luck'];
					
					//now that we have all needed data, create the new player character object
					$_SESSION["player_character"] = new $className($userName, $playerLevel, $playerHp, $playerAp, $playerXp, $playerAttacks, $playerAttributes);
				}
				else
				{
					die("Problem pulling your character from the db.");
				}
				$result->close();
				$datarow = null;
				$sql = null;
			}
			
			$sql = "SELECT uc.user_id, a1.attack_id attack_1_id, a2.attack_id attack_2_id, a3.attack_id attack_3_id, a1.attack_name attack_1_name, a1.ap_cost attack_1_ap, a1.damage attack_1_dmg, a2.attack_name attack_2_name, a2.ap_cost attack_2_ap, a2.damage attack_2_dmg, a3.attack_name attack_3_name, a3.ap_cost attack_3_ap, a3.damage attack_3_dmg FROM user_character uc INNER JOIN playable_character_attack a1 ON uc.attack_id_1 = a1.attack_id INNER JOIN playable_character_attack a2 ON uc.attack_id_2 = a2.attack_id INNER JOIN playable_character_attack a3 ON uc.attack_id_3 = a3.attack_id WHERE uc.user_id =  '{$userName}';";
			//get user character information regarding the attack_ids
			if ($result = $db->query($sql)) 
			{
				if($result->num_rows === 1)
				{
					$datarow = $result->fetch_array(MYSQLI_ASSOC); 
					
					$playerAttack1Id =  $datarow['attack_1_id'];
					$playerAttack2Id =  $datarow['attack_2_id'];
					$playerAttack3Id =  $datarow['attack_3_id'];
					
					$playerAttack1Name =  $datarow['attack_1_name'];
					$playerAttack2Name =  $datarow['attack_2_name'];
					$playerAttack3Name =  $datarow['attack_3_name'];
					
					$playerAttack1Ap = (int) $datarow['attack_1_ap'];
					$playerAttack2Ap = (int) $datarow['attack_2_ap'];
					$playerAttack3Ap = (int) $datarow['attack_3_ap'];
					
					$playerAttack1Dmg = (int) $datarow['attack_1_dmg'];
					$playerAttack2Dmg = (int) $datarow['attack_2_dmg'];
					$playerAttack3Dmg = (int) $datarow['attack_3_dmg'];
				}
				else
				{
					die("Your character does not have any attacks.");
				}
				$result->close(); //free the result set
				$datarow = null;
				$sql = null;
			}	
			///////*NPC CHARACTER*////////
			//get npc name query
			//determine if fighting grunt or boss npc
			if ($npc_type == "grunt")
				$sql = "SELECT npc_character_id, npc_character_name, gc.continent_id FROM npc_character npc inner join geography_city gc on gc.city_id=npc.city_id where gc.continent_id = {$continent_id}";
			else
				$sql= "select character_type_id as npc_character_id, character_type_desc as npc_character_name from base_character where boss_flg='t' and continent_id= {$continent_id};";
			
			//echo $sql;
			if($result = $db->query($sql)) 
			{
				$npcOptions = array();
				$i=0;
				while($datarow = $result->fetch_array(MYSQLI_ASSOC))
				{
					$npcOptions[$i] = $datarow;
					$i++;
				}

				$randLimit = (sizeof($npcOptions) - 1);
				$npcChoice = mt_rand(0, $randLimit);
				$npcName = $npcOptions[$npcChoice]['npc_character_name'];

				$result->close(); //free the result set
				$datarow = null;
				$sql = null;
			}

			
			//randomly choose a grunt template for each fight sequence
			$npcTemplate = mt_rand(7, 11);
			//get npc status and attributes, then create the npc character object
			$sql = "select bc.character_type_desc character_type_desc, bc.character_type_id character_type_id, bc.hp hp, bc.ap ap, bc.stealth stealth, bc.chi chi, bc.intelligence iq, bc.luck luck, bc.strength strength, bc.speed speed from base_character bc where upper(bc.npc_flg) = 'T' and bc.character_type_id = {$npcTemplate};";
			//echo $sql;
			if ($result = $db->query($sql)) 
			{
				if($result->num_rows == 1)
				{
					$datarow = $result->fetch_array(MYSQLI_ASSOC); 
					$npcCharacterType = trim($datarow['character_type_desc']);
					//Get this npc character template data:
					
					//stats
					$npcHp    = (int) $datarow['hp'];
					$npcAp    = (int) $datarow['ap'];	
					//atributes
					$npcAttributes = array();
					$npcAttributes['stealth']  = (int) $datarow['stealth'];
					$npcAttributes['chi']      = (int) $datarow['chi'];
					$npcAttributes['iq']       = (int) $datarow['iq'];
					$npcAttributes['strength'] = (int) $datarow['strength'];
					$npcAttributes['speed']    = (int) $datarow['speed'];
					$npcAttributes['luck']     = (int) $datarow['luck'];
					//var_dump($npcAttributes);
				}
				else
				{
					//echo $result->num_rows;
					die("Error with npc stats/attributes query resultset number of rows.{$result->num_rows}");
				}
				$result->close();
				$datarow = null;
				$sql = null;
			}
			
			//get npc character information regarding the attack_ids
			$randomAttack = array();
			$randomAttack[0] = mt_rand(1, 70);
			$randomAttack[1] = mt_rand(1, 70);
			$randomAttack[2] = mt_rand(1, 70);
			
			$npcAttack = array();
			$sql = "SELECT nca.attack_id attack_id, nca.attack_name attack_name, nca.ap_cost ap_cost, nca.damage damage FROM npc_character_attack nca WHERE nca.attack_id in ({$randomAttack[0]},{$randomAttack[1]},{$randomAttack[2]});";
			if ($result = $db->query($sql)) 
			{
				$i = 1;
				while($datarow = $result->fetch_array(MYSQLI_ASSOC))
				{
					$npcAttack['attack_id_'.$i]['id']      =  $datarow['attack_id'];
					$npcAttack['attack_id_'.$i]['name']    =  $datarow['attack_name'];
					$npcAttack['attack_id_'.$i]['ap_cost'] =  $datarow['ap_cost'];
					$npcAttack['attack_id_'.$i]['damage']  =  $datarow['damage'];
					
					$i++;
				}
				//reset the variables
				$result->close();
				$datarow = null;
				$i = null;
				
				//var_dump($npcAttack);
				
					$_SESSION["npc_character"] = new NpcCharacter($npcName, $npcHp, $npcAp, $npcAttack, $npcAttributes);				
			}																		
			
			//check the geography_user_status table to determine how many attribute points to give to the npc
				//if they are on the first enemy then that npc will get enough attribute points to be 2 levels worse than the user character
				//if they are the second enemy then that npc will get enough attribute points to be 1 level worse than the user character
				//if they are the third or greater than they will be the same level as the user character
					
			//compare stealth attribute to determine if the player or npc attacks first
			if($playerAttributes['stealth'] >= $npcAttributes['stealth'])
				$_SESSION['attack_first'] = $userName;
			else
				$_SESSION['attack_first'] = $_SESSION["npc_character"]->getUserName();
				
			//return the data as JSON string
			$returnObj = array
			(
				'display_text' => 'The fight has begun!', 
				'user_name' => $_SESSION["player_character"]->getUserName(), 
				'npc_name' => $_SESSION["npc_character"]->getUserName(), 
				'attack_first' => $_SESSION['attack_first'], 
				'user_hp' => $_SESSION["player_character"]->getHp(), 
				'user_ap' => $_SESSION["player_character"]->getAp(), 
				'npc_hp' => $npcHp, 
				'npc_ap' => $npcAp,
				'user_attack1_name' => $playerAttack1Name, 
				'user_attack2_name' => $playerAttack2Name, 
				'user_attack3_name' => $playerAttack3Name, 
				'user_attack1_ap' => $playerAttack1Ap, 
				'user_attack2_ap' => $playerAttack2Ap, 
				'user_attack3_ap' => $playerAttack3Ap, 
				'user_attack1_dmg' => $playerAttack1Dmg, 
				'user_attack2_dmg' => $playerAttack2Dmg, 
				'user_attack2_dmg' => $playerAttack3Dmg, 
				'user_attack1_id' => $playerAttack1Id, 
				'user_attack2_id' => $playerAttack2Id, 
				'user_attack3_id' => $playerAttack3Id,
				'npc_type_desc' => $npcCharacterType, 
				'user_type_desc' => get_class($_SESSION["player_character"]),
			);
			
			echo json_encode($returnObj);
		}
		
		else if($action == "user_attack")
		{
			//keep track of how many turns the user has used
			if(!isset($_SESSION['user_turn_counter']))
				$_SESSION['user_turn_counter'] = 1;
			else
				$_SESSION['user_turn_counter']++;
			
			//get requested attack related information from the db
			$userAttackId = (int) $_REQUEST['attackId'];
			if ($result = $db->query("SELECT a.attack_id attack_id, a.attack_name attack_name, a.damage attack_damage, a.ap_cost attack_ap_cost FROM playable_character_attack a WHERE a.attack_id = {$userAttackId};")) 
			{
				$npcName = $_SESSION["npc_character"]->getUserName();
				if($result->num_rows === 1)
				{
					$datarow = $result->fetch_array(MYSQLI_ASSOC); 
					
					$attackId     =  $datarow['attack_id'];
					$attackName   =  $datarow['attack_name'];
					$attackDamage =  $datarow['attack_damage'];
					$attackApCost =  $datarow['attack_ap_cost'];
					
					$adjustedAttackDamage = $attackDamage;
					/*critical strike logic*/
					$userLuck = $_SESSION["player_character"]->getLuck();
					$theRange = 4;
					$rangeMax = 20;
					$criticalStrike = false;
					$adjustedAttackDamage = $attackDamage;
					if( $userLuck == 1 )
					{
						$theRange = 0;  //no chance of a critical strike
					}
					else if( $userLuck == 1 || $userLuck == 2)
					{
						$theRange = 2;
						$rangeMax--;
					}
					else if( $userLuck >= 3 && $userLuck <= 5)	
						$theRange = 1;
						$rangeMax--;				
						if($userLuck == 4)
							$rangeMax--;
						else if($userLuck == 5)
							$rangeMax = ($rangeMax - 2);	
					else if( $userLuck == 6 || $userLuck == 7)
						$theRange = 3;
						$rangeMax = ($rangeMax - 2);
						
						if($userLuck == 7)
							$rangeMax--;	
					else if( $userLuck == 8 || $userLuck == 9)
					{
						$theRange = 4;
						$rangeMax = ($rangeMax - 3);
						
						if($userLuck == 9)
							$rangeMax = ($rangeMax - 2);
					}
					else if( $userLuck == 10)
					{
						$theRange = 6;
						$rangeMax = ($rangeMax - 4);
					}

					$luckyNumbers = array();
					$i = 0;
					while(count($luckyNumbers) < $theRange)
					{	
						$number = mt_rand(1, $rangeMax);
						if(!in_array($number, $luckyNumbers))
						{
							$luckyNumbers[$i] = $number;
							$i++;
						}
					}

					$findThisforCriticalHit = mt_rand(1, $rangeMax);
					if(in_array($findThisforCriticalHit, $luckyNumbers))
					{
						$adjustedAttackDamage = $attackDamage + ceil(($attackDamage * $_SESSION["player_character"]->getCriticalHitMultiplier($_SESSION["player_character"]->getStrength())));
						$criticalStrike = true;
					}
					/*end critical strike logic*/
										
					//check if the player character has enough AP to use the desired move
					if($_SESSION["player_character"]->meetsApRequirement($attackApCost))
					{
						//set the updated AP
						$_SESSION["player_character"]->deductAp($attackApCost);
						
						//set the updated HP
						$_SESSION["npc_character"]->takeHit($adjustedAttackDamage);
						
						$remainingAp = $_SESSION["player_character"]->getAp();
						//check if the player character is still alive
						if($_SESSION["npc_character"]->getHp() > 0)
						{
							$remainingHp = $_SESSION["npc_character"]->getHp();
							
							$display_txt = "{$userName} landed {$attackName}! <li>The hit does {$adjustedAttackDamage} damage to {$npcName}.</li>";
							$_SESSION["player_character"]->giveBackAp($_SESSION["player_character"]->getChi());
							
							$remainingAp = $_SESSION["player_character"]->getAp();
							$returnObj = array('return_description'=> 'success', 'display_text' => $display_txt, 'npc_hp' => $remainingHp, 'user_ap' => $remainingAp, 'user_turn_counter' => $_SESSION['user_turn_counter']);
							echo json_encode($returnObj);
						}
						else
						{
							$remainingHp = 0;
							$display_txt = "{$userName} delivered the finishing blow! You win!!";
							$_SESSION['wins']++;

							$win_count=0;
							$sql = "select win_count from user_character where user_id= '{$userName}'";
							if ($result=$db->query($sql))
							{
								$datarow = $result->fetch_array(MYSQLI_ASSOC); 
					
								$win_count= $datarow['win_count'];
							}

							$sql= null;
							$sql = "Update user_character set win_count=({$win_count}+1) where user_id='{$userName}';";
							$returnObj = array('return_description'=> 'fight_over', 'display_text' => $display_txt, 'npc_hp' => $remainingHp, 'user_ap' => $remainingAp, 'user_turn_counter' => $_SESSION['user_turn_counter']);
							echo json_encode($returnObj);
						}
					}
					else
					{
						$_SESSION["player_character"]->giveBackAp($_SESSION["npc_character"]->getChi());
						$returnObj = array('return_description' => 'insufficient_ap', 'user_current_ap' => $_SESSION["player_character"]->getAp(), 'display_text' => "{$userName} doesnt have sufficient AP to perform {$attackName}!", );
						echo json_encode($returnObj);
					}			
				}
				else
				{
					echo "Error getting user attack data from the db.";
				}
			}
		}
		
		else if($action == "npc_attack")
		{
			$npcName = $_SESSION["npc_character"]->getUserName();
			//randomly pick which attack the npc will use
			$generatedAttackChoice = mt_rand(1,3);
			$npcAttackId = null;
			switch($generatedAttackChoice)
			{
				case 1 : 
					$npcAttackId = $_SESSION['npc_character']->getAttackList()['attack1'];
					break;
				case 2 : 
					$npcAttackId = $_SESSION['npc_character']->getAttackList()['attack2'];
					break;
				case 3 : 
					$npcAttackId = $_SESSION['npc_character']->getAttackList()['attack3'];
					break;
			}
			
			if ($result = $db->query("SELECT a.attack_id attack_id, a.attack_name attack_name, a.damage attack_damage, a.ap_cost attack_ap_cost FROM npc_character_attack a WHERE a.attack_id = {$npcAttackId};")) 
			{
				if($result->num_rows === 1)
				{
					$datarow = $result->fetch_array(MYSQLI_ASSOC); 
					
					$attackId     =  $datarow['attack_id'];
					$attackName   =  $datarow['attack_name'];
					$attackDamage =  $datarow['attack_damage'];
					$attackApCost =  $datarow['attack_ap_cost'];
					
					/*critical strike logic*/
					$npcLuck = $_SESSION["npc_character"]->getLuck();
					$theRange = 4;
					$rangeMax = 20;
					$criticalStrike = false;
					$adjustedAttackDamage = $attackDamage;
					if( $npcLuck == 1 )
					{
						$theRange = 0;  //no chance of a critical strike
					}
					else if( $npcLuck == 1 || $npcLuck == 2)
					{
						$theRange = 2;
						$rangeMax--;
					}
					else if( $npcLuck >= 3 && $npcLuck <= 5)	
						$theRange = 1;
						$rangeMax--;				
						if($npcLuck == 4)
							$rangeMax--;
						else if($npcLuck == 5)
							$rangeMax = ($rangeMax - 2);	
					else if( $npcLuck == 6 || $npcLuck == 7)
						$theRange = 3;
						$rangeMax = ($rangeMax - 2);
						
						if($npcLuck == 7)
							$rangeMax--;	
					else if( $npcLuck == 8 || $npcLuck == 9)
					{
						$theRange = 4;
						$rangeMax = ($rangeMax - 3);
						
						if($npcLuck == 9)
							$rangeMax = ($rangeMax - 2);
					}
					else if( $npcLuck == 10)
					{
						$theRange = 6;
						$rangeMax = ($rangeMax - 4);
					}
					
					$luckyNumbers = array();
					$i = 0;
					while(count($luckyNumbers) < $theRange)
					{	
						$number = mt_rand(1, $rangeMax);
						if(!in_array($number, $luckyNumbers))
						{
							$luckyNumbers[$i] = $number;
							$i++;
						}
					}
					
					$findThisforCriticalHit = mt_rand(1, $rangeMax);
					if(in_array($findThisforCriticalHit, $luckyNumbers))
					{
						$adjustedAttackDamage = $attackDamage + ceil(($attackDamage * $_SESSION["npc_character"]->getCriticalHitMultiplier($_SESSION["npc_character"]->getStrength())));
						$criticalStrike = true;
					}
					/*end critical strike logic*/

					//check if the player character has enough AP to use the desired move
					if($_SESSION["npc_character"]->meetsApRequirement($attackApCost))
					{
						//set the updated AP
						$_SESSION["npc_character"]->deductAp($attackApCost);
						
						//set the updated HP
						$_SESSION["player_character"]->takeHit($adjustedAttackDamage);
						
						$remainingAp = $_SESSION["npc_character"]->getAp();
						//check if the player character is still alive
						if($_SESSION["player_character"]->getHp() > 0)
						{
							$remainingHp = $_SESSION["player_character"]->getHp();
							
							$display_txt = "<li>{$npcName} used {$attackName}";
							if($criticalStrike)
							{
								$display_txt .= "<li>{$npcName} landed a critical hit! {$userName} is trying not to cry!</li>";
							}
							
							$display_txt .= "<li>{$attackName} hits {$userName} for {$adjustedAttackDamage}..</li>";
							$_SESSION["npc_character"]->giveBackAp($_SESSION["npc_character"]->getChi());
							
							$remainingAp = $_SESSION["npc_character"]->getAp();
							$returnObj = array('return_description'=> 'success', 'user_name' => $_SESSION['player_character']->getUserName(), 'npc_name' => $_SESSION['npc_character']->getUserName(), 'display_text' => $display_txt, 'user_hp' => $remainingHp, 'npc_ap' => $remainingAp, 'user_turn_counter' => $_SESSION['user_turn_counter']);
							echo json_encode($returnObj);
						}
						else
						{
							$remainingHp = 0;
							$display_txt = "<li>{$npcName} delivered the finishing blow!</li> <li>You lose - you suck!</li>";
							$_SESSION['losses']++;
							
							$returnObj = array('return_description'=> 'fight_over', 'display_text' => $display_txt, 'user_hp' => $remainingHp, 'npc_ap' => $remainingAp, 'user_turn_counter' => $_SESSION['user_turn_counter']);
							echo json_encode($returnObj);
						}
					}
					else
					{
						$_SESSION["npc_character"]->giveBackAp($_SESSION["npc_character"]->getChi());
						$returnObj = array('return_description' => 'insufficient_ap', 'npc_current_ap' => $_SESSION["npc_character"]->getAp(), 'display_text' => "{$npcName} doesnt have sufficient AP to perform {$attackName}!", 'user_name' => $_SESSION['player_character']->getUserName(), 'npc_name' => $_SESSION['npc_character']->getUserName());
						echo json_encode($returnObj);
					}
				}
				else
				{
					echo "Error getting user attack data from the db.";
				}
				//echo "Enemy using attack: {$attackName}";
			}
		}	
	}
	else
	{
		die("No action was defined. Script is confused!!");
	}
?>