var attackNext;
var continentId;
/*request sending functions*/
function startFight(continent_id)
{
	continentId = continent_id;
	var data = new Object();
	data.action = "start_fight";
	data.continent_id=continent_id;
	$.post("../../php/fight.php", data, startFightCallback);
}

function userAttack( attackId )
{
	console.log(attackId);
	var data = new Object();
	data.action = "user_attack";
	data.attackId = attackId;
	data.continent_id = continentId;
	$.post("../../php/fight.php", data, userAttackCallback);
}

function npcAttack()
{
	var data = new Object();
	data.action = "npc_attack";
	data.continent_id = continentId;
	$.post("../../php/fight.php", data, npcAttackCallback);
}






/*request callback functions*/
function startFightCallback( data )
{
	console.log(data);
	//cleanUpTextScroll();
	var returnObj = JSON.parse(data);
	
	//display text in the text scroll
	var textConsole = document.getElementById("battle_text");
	textConsole.innerHTML = "<li>"+returnObj.display_text+"</li>";
	textConsole.innerHTML += "<li>"+returnObj.attack_first+" attacks first!</li>";
	
	//show the images avatar images
	var userImg = document.getElementById("player_position");
	userImg.innerHTML = "<img src='../../images/avatars/"+returnObj.user_type_desc+".jpg' />";
	
	var enemyImg = document.getElementById("enemy_position");
	enemyImg.innerHTML = "<img src='../../images/avatars/"+returnObj.npc_type_desc+".jpg' />";
	
	//display user name where needed
	document.getElementById("disp_player_name_stat").innerHTML = returnObj.user_name+"'s stats";
	document.getElementById("disp_player_name_inv").innerHTML = returnObj.user_name+"'s inventory";
	
	//display npc name where needed
	document.getElementById("disp_npc_name_stat").innerHTML = returnObj.npc_name+"'s stats";
	
	//display user HP
	document.getElementById("display_npc_hp").innerHTML = returnObj.npc_hp;
	document.getElementById("display_npc_ap").innerHTML = returnObj.npc_ap;
	
	//display user AP
	document.getElementById("display_user_hp").innerHTML = returnObj.user_hp;
	document.getElementById("display_user_ap").innerHTML = returnObj.user_ap;
	
	//display user Attacks
	document.getElementById("user_attack_1_name").innerHTML = returnObj.user_attack1_name;
	document.getElementById("user_attack_2_name").innerHTML = returnObj.user_attack2_name;
	document.getElementById("user_attack_3_name").innerHTML = returnObj.user_attack3_name;
	
	document.getElementById("user_attack_1_id").value = returnObj.user_attack1_id;
	document.getElementById("user_attack_2_id").value = returnObj.user_attack2_id;
	document.getElementById("user_attack_3_id").value = returnObj.user_attack3_id;
	
	document.getElementById("user_attack_1_ap").innerHTML = returnObj.user_attack1_ap+" AP";
	document.getElementById("user_attack_2_ap").innerHTML = returnObj.user_attack2_ap+" AP";
	document.getElementById("user_attack_3_ap").innerHTML = returnObj.user_attack3_ap+" AP";
	
	determineWhoCanAttack(returnObj);
}

function flashRedUser()
{
	
	setTimeout(function(){$("#enemy_position").css("background-color", "yellow")},0);
	setTimeout(function(){$("#enemy_position").css("background-color", "red")},100);
	setTimeout(function(){$("#enemy_position").css("background-color", "yellow")},200);
	setTimeout(function(){$("#enemy_position").css("background-color", "red")},300);
	setTimeout(function(){$("#enemy_position").css("background-color", "yellow")},400);
	setTimeout(function(){$("#enemy_position").css("background-color", "red")},500);
	setTimeout(function(){$("#enemy_position").css("background-color", "white")},600);
}
function userAttackCallback( data )
{
	console.log(data);
	var returnObj = JSON.parse(data);
	var textConsole = document.getElementById("battle_text");
	if(returnObj.return_description == "success")
	{
		flashRedUser();
		//update the message in the console window
		textConsole.innerHTML = "<li>"+returnObj.display_text+"</li>";
		
		//update npc HP
		document.getElementById("display_npc_hp").innerHTML = returnObj.npc_hp;
		
		//updated user AP
		document.getElementById("display_user_ap").innerHTML = returnObj.user_ap;
		
		//set the variable that determines who attacks next to the the npc
		attackNext = returnObj.user_name;
		determineWhoCanAttack(returnObj);  
	}
	else if(returnObj.return_description == "insufficient_ap")
	{
		//update the message in the console window to let the user know they do not have enough AP to use their attack
		attackNext = returnObj.npc_name;
		document.getElementById('display_user_ap').innerHTML = returnObj.user_current_ap;		
		textConsole.innerHTML = "<li>"+returnObj.display_text+"</li><li>Skipping turn..</li>";
		determineWhoCanAttack(returnObj);  
	}
	else if(returnObj.return_description == "fight_over")
	{
		//update the message in the console window to let the know they have won the fight
		textConsole.innerHTML = "<li>"+returnObj.display_text+"</li>";
		
		//update npc HP
		document.getElementById("display_npc_hp").innerHTML = returnObj.npc_hp;
		
		//update user character AP
		document.getElementById("display_user_ap").innerHTML = returnObj.user_ap;
		
		//disableUserFromAttacking();
		
		setTimeout(function(){redirectToLocations()},500);
	}
	else
	{
		textConsole.innerHTML = data;
	}
}

function redirectToLocations()
{
	window.location.assign("choose_location.php");
}
function flashRedNpc()
{	
	setTimeout(function(){$("#player_position").css("background-color", "yellow")},0);
	setTimeout(function(){$("#player_position").css("background-color", "red")},100);
	setTimeout(function(){$("#player_position").css("background-color", "yellow")},200);
	setTimeout(function(){$("#player_position").css("background-color", "red")},300);
	setTimeout(function(){$("#player_position").css("background-color", "yellow")},400);
	setTimeout(function(){$("#player_position").css("background-color", "red")},500);
	setTimeout(function(){$("#player_position").css("background-color", "white")},600);
}
function npcAttackCallback( data )
{
	console.log(data);
	var returnObj = JSON.parse(data);
	var textConsole = document.getElementById("battle_text");
	
	if(returnObj.return_description == "success")
	{
		flashRedNpc();
		//update the message in the console window
		textConsole.innerHTML = returnObj.display_text;
		
		//update user HP
		document.getElementById("display_user_hp").innerHTML = returnObj.user_hp;
		
		//update npc AP
		document.getElementById("display_npc_ap").innerHTML = returnObj.npc_ap;
		
		//set the variable that determines who attacks next to the the user character
		attackNext = returnObj.user_name;	
		determineWhoCanAttack(returnObj); 
	}
	else if(returnObj.return_description == "insufficient_ap")
	{
		//update the message in the console window to let the user know the npc does not have enough AP to use their attack
		textConsole.innerHTML = "<li>"+returnObj.display_text+"</li><li>Skipping turn..</li>";
		document.getElementById('display_npc_ap').innerHTML = returnObj.npc_current_ap;
		attackNext = returnObj.user_name;	
		determineWhoCanAttack(returnObj); 
	}
	else if(returnObj.return_description == "fight_over")
	{
		//update the message in the console window to let the know they have lost the fight
		textConsole.innerHTML = returnObj.display_text;
		
		//update user HP
		document.getElementById("display_user_hp").innerHTML = returnObj.user_hp;
		
		//update npc AP
		document.getElementById("display_npc_ap").innerHTML = returnObj.npc_ap;
	
		//the fight is over so the user shouldnt be allowed to try to attack anymore
		disableUserAttackOptions();
		
		//exit the fight view and direct the user to the fight summary screen
		setTimeout(function(){redirectToLocations()},500);
	}
	else
	{
		textConsole.innerHTML = data;
	}
}


//function directToSummaryPage( theReturnObject )



/*miscellaneous functions*/
function disableUserAttackOptions()
{
	$("#user_attack_1_name").prop("disabled",true);
	$("#user_attack_2_name").prop("disabled",true);
	$("#user_attack_3_name").prop("disabled",true);
	
}

function enableUserAttackOptions()
{
	
	$("#user_attack_1_name").prop("disabled", false);
	$("#user_attack_2_name").prop("disabled", false);
	$("#user_attack_3_name").prop("disabled", false);

}

function determineWhoCanAttack( returnData )
{
	if(attackNext == null)
	{
		disableUserAttackOptions();
		if(returnData.attack_first == returnData.npc_name)
			setTimeout(function(){npcAttack()}, 3000);
		else if(returnData.attack_first == returnData.user_name)
			setTimeout(function(){enableUserAttackOptions()}, 500);
	}
	else if(attackNext == returnData.npc_name)
	{
		disableUserAttackOptions();
		setTimeout(function(){npcAttack()}, 2200);
	}
	else
	{
		setTimeout(function(){enableUserAttackOptions()}, 1000); //wait a second to let the user execute another attack
	}
}