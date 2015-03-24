<?php
session_start();
include_once "../db_conn.php";

$queryFlg = null;
$answer = array();
$answer[0] = $_POST['q1'];
$answer[1] = $_POST['q2'];
$answer[2] = $_POST['q3'];
$answer[3] = $_POST['q4'];
$answer[4] = $_POST['q5'];
$good = 0;

for($i = 0; $i < sizeof($answer); $i++)
{
	if ($answer[$i]==null || trim($answer[$i])=="")
		//re-direct back to the test screen
		header("Location: ../test_screen.php");

	if($answer[$i] == 'B')
		$good++;
}
if($good >= 3)
	$queryFlg = "g";
else
	$queryFlg = "e";
	
$sql = "SELECT bx.character_type_id, bx.character_type_desc, txt.bio FROM base_character bx INNER JOIN character_related_text txt ON bx.character_type_id = txt.character_type_id WHERE LOWER( good_evil_flg ) IN ('{$queryFlg}',  'b');";
if ($result = $db->query($sql)) 
{
	$characterList = array();
	$i = 0;
	while($datarow = $result->fetch_array(MYSQLI_ASSOC))
	{
		$characterList[$i] = $datarow;
		//var_dump($characterList[$i]);
		$i++;
		
	}
}
else
{
	echo $db->error;
}
echo <<< EOT
<html>
	<head>
		<link href='../../css/build_character.css' rel='stylesheet' type='text/css'>
		<script src='../../js/jquery.js'></script>
		<script src='../../js/build_character.js' type='text/javascript'></script>
	</head>
	<body onload="disableButtons();toggleContinueBtn();">		
		<div id="header">
			<div align="center"><h1><font color="white">Create your character</font></h1></div>
		</div>
		
		<!--<table id="tbl_name_field">
			<tr>
				<td><label>Choose character name:</label></td>
				<td><input id="txt_char_name"type="text" onkeyup="validateCharacterName();toggleContinueBtn();"></td>
				<td><div id="display_msg"></div></td>
			</tr>
		</table>-->
		
		<div id="content_section">
				<table border="1" id="tbl_main" width="100%">
					<tr>
						<td>
							<div align="center"><h3>Your character options: </h3></div>
							<select id="slct_char_type" size="4" onchange="showCharacterMsg();validateCharacterTypeSelected();toggleContinueBtn();resetPoints();">
EOT;
								for($i = 0; $i < sizeof($characterList); $i++)
								{
									echo "<option value='{$characterList[$i]['character_type_id']}'>{$characterList[$i]['character_type_desc']}</option>\n";
								}
echo <<<EOT
							</select>
						</td>
						<td>
							<div id="display_avatar" align="center">
								Choose a character to view their avatar.
							</div>
						</td>
						<td>
							<div id="display_attributes" align="center">
								<!--Choose a character to view their attributes.-->
								<table border="0" id="tbl_attr_display" width="55%">
									<tr><th colspan="100%"><h5>Distribute <font color="red"><span id="atr_pts_remaining">5</span></font> additional attributes</h5></th></tr>
									<tr>
										<td><label>Strength:</label></td>
										<td id="character_strength_display"></td>
										<td><button id="btn_increase_strength" onclick="increaseAttributeVal(this.id)">+</button></td>
									</tr>
								
								<tr>
									<td><label>Intelligence:</label></td>
									<td id="character_intelligence_display"></td>
									<td><button id="btn_increase_intelligence" onclick="increaseAttributeVal(this.id)">+</button></td>
								</tr>
								
								<tr>
									<td><label>Speed:</label></td>
									<td id="character_speed_display"></td>
									<td><button id="btn_increase_speed" onclick="increaseAttributeVal(this.id)">+</button></td>
								</tr>
								
								<tr>
									<td><label>Stealth:</label></td>
									<td id="character_stealth_display"></td>
									<td><button id="btn_increase_stealth" onclick="increaseAttributeVal(this.id)">+</button></td>
								</tr>
								
								<!--<tr>
									<td><label>Agility:</label></td>
									<td id="character_agility_display"></td>
									<td><button id="btn_increase_agility" onclick="increaseAttributeVal(this.id)">+</button></td>
								</tr>-->
								
								<tr>
									<td><label>Luck:</label></td>
									<td id="character_luck_display"></td>
									<td><button id="btn_increase_luck" onclick="increaseAttributeVal(this.id)">+</button></td>
								</tr>
								
								<tr>
									<td><label>Chi:</label></td>
									<td id="character_chi_display"></td>
									<td><button id="btn_increase_chi" onclick="increaseAttributeVal(this.id)">+</button></td>
								</tr>
							</table>
							</div>
						</td>
					</tr>
				</table>
			
		</div>
		
		<div id="description">
			<b>Choose a character from the list to learn more about them.</b>
		</div>
		
		<div align="center">
			<button id="btn_continue" onclick="sendCreateRequest(document.getElementById('character_speed_display').value,document.getElementById('character_strength_display').value,document.getElementById('character_luck_display').value,document.getElementById('character_intelligence_display').value,document.getElementById('character_chi_display').value,document.getElementById('character_stealth_display').value);" disabled>Create Character</button><!--sendCreateRequest()-->
		</div>
	</body>
</html>
EOT
?>