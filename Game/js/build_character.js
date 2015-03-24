function disableButtons()
{
	var allBtns = document.getElementsByTagName("button");
	for(i = 0; i < allBtns.length; i++)
		allBtns[i].disabled = true;
}

function enableButtons()
{
	var allBtns = document.getElementsByTagName("button");
	for(i = 0; i < allBtns.length; i++)
		allBtns[i].disabled = false;	
}

function showCharacterMsg()
{
	var desc_txt = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam est dui, bibendum ut metus a, cursus commodo enim. Mauris laoreet malesuada ullamcorper. In id ligula malesuada, interdum velit sed, ornare metus. Cras gravida nunc sed laoreet tristique. Proin non metus ut neque placerat placerat. Curabitur tristique nisi massa, feugiat laoreet lacus tincidunt eu. Aenean malesuada felis velit, sit amet dignissim nisl ullamcorper eu. Morbi quis porta neque. Fusce aliquet sem in tellus molestie, in rutrum magna commodo. Maecenas tincidunt, justo id lacinia vulputate, leo nisi porttitor sem, sit amet fermentum lectus magna quis felis. Vestibulum condimentum justo orci, at vestibulum sem lobortis vel. Fusce volutpat lectus eu ligula sollicitudin, sed consequat lorem vehicula.";
	var choice = document.getElementById("slct_char_type").value;
	var imageToShow = document.getElementById("display_avatar");
	var attributesToShow = document.getElementById("display_attributes");
	var choiceType;
	
	switch(choice)
	{
	case "004":
		choiceType = "Ninja";
		desc_txt = "Stealthy assassin trained in the art of deception. It is said that this purveyor of darkness controls the ancient elements.";
		imageToShow.innerHTML = "<img src='../../images/avatars/ninja.png'>";
		document.getElementById("character_strength_display").innerHTML = "1";       //strength
		document.getElementById("character_strength_display").value = "1";
		
		document.getElementById("character_intelligence_display").innerHTML = "1";   //intelligence
		document.getElementById("character_intelligence_display").value = "1";
		
		document.getElementById("character_speed_display").innerHTML = "5";          //speed
		document.getElementById("character_speed_display").value = "5"; 
		
		document.getElementById("character_stealth_display").innerHTML = "6";        //stealth
		document.getElementById("character_stealth_display").value = "6"; 
		
		/*document.getElementById("character_agility_display").innerHTML = "8";        //agility
		document.getElementById("character_agility_display").value = "8"; */
		
		document.getElementById("character_luck_display").innerHTML = "1";           //luck
		document.getElementById("character_luck_display").value = "1"; 
		
		document.getElementById("character_chi_display").innerHTML = "2";            //chi		
		document.getElementById("character_chi_display").value = "2"; 		
		break;		
	
	case "001":
		choiceType = "Boxer";
		imageToShow.innerHTML = "<img src='../../images/avatars/boxer.jpg'>";
		document.getElementById("character_strength_display").innerHTML = "5";       //strength
		document.getElementById("character_strength_display").value = "5";
		
		document.getElementById("character_intelligence_display").innerHTML = "3";   //intelligence
		document.getElementById("character_intelligence_display").value = "3";
		
		document.getElementById("character_speed_display").innerHTML = "3";          //speed
		document.getElementById("character_speed_display").value = "3"; 
		
		document.getElementById("character_stealth_display").innerHTML = "1";        //stealth
		document.getElementById("character_stealth_display").value = "1"; 
		
		/*document.getElementById("character_agility_display").innerHTML = "8";        //agility
		document.getElementById("character_agility_display").value = "8"; */
		
		document.getElementById("character_luck_display").innerHTML = "2";           //luck
		document.getElementById("character_luck_display").value = "2"; 
		
		document.getElementById("character_chi_display").innerHTML = "2";            //chi		
		document.getElementById("character_chi_display").value = "2"; 		
		break;		
						
	case "021":
		choiceType = "Monk";
		imageToShow.innerHTML = "<img src='../../images/avatars/monk.jpg'>";
		document.getElementById("character_strength_display").innerHTML = "1";       //strength
		document.getElementById("character_strength_display").value = "1";
		
		document.getElementById("character_intelligence_display").innerHTML = "4";   //intelligence
		document.getElementById("character_intelligence_display").value = "4";
		
		document.getElementById("character_speed_display").innerHTML = "2";          //speed
		document.getElementById("character_speed_display").value = "2"; 
		
		document.getElementById("character_stealth_display").innerHTML = "1";        //stealth
		document.getElementById("character_stealth_display").value = "1"; 
		
		/*document.getElementById("character_agility_display").innerHTML = "8";        //agility
		document.getElementById("character_agility_display").value = "8"; */
		
		document.getElementById("character_luck_display").innerHTML = "3";           //luck
		document.getElementById("character_luck_display").value = "3"; 
		
		document.getElementById("character_chi_display").innerHTML = "5";            //chi		
		document.getElementById("character_chi_display").value = "5"; 		
		break;

		case "003":
		choiceType = "BJJ";
		desc_txt = "Grew up in the slums of Brazil and looking for an outlet, turned to JiuJitsu. As a way to escape the violence that surrounded him, he let BJJ consume him. ";
		imageToShow.innerHTML = "<img src='../../images/avatars/bjj.jpg'>";
		document.getElementById("character_speed_display").innerHTML = "4";          //speed
		document.getElementById("character_speed_display").value = "4"; 
		
		document.getElementById("character_strength_display").innerHTML = "2";       //strength
		document.getElementById("character_strength_display").value = "2";
		
		document.getElementById("character_luck_display").innerHTML = "5";           //luck
		document.getElementById("character_luck_display").value = "5"; 
		
		document.getElementById("character_intelligence_display").innerHTML = "2";   //intelligence
		document.getElementById("character_intelligence_display").value = "2";
		
		document.getElementById("character_chi_display").innerHTML = "2";            //chi		
		document.getElementById("character_chi_display").value = "2"; 		
		
		document.getElementById("character_stealth_display").innerHTML = "1";        //stealth
		document.getElementById("character_stealth_display").value = "1"; 
		
		/*document.getElementById("character_agility_display").innerHTML = "8";        //agility
		document.getElementById("character_agility_display").value = "8"; */			
		break;	

	case "005":
		choiceType = "Muay Thai";
		imageToShow.innerHTML = "<img src='../../images/avatars/muaythai.jpg'>";
		desc_txt = "Abandoned in a beach paradise somewhere in Thailand, grew up to be anything but soft like the sand that surrounded him. Has a body as solid as the sacred elephant. Have limbs as hard as pure steel.";
		document.getElementById("character_speed_display").innerHTML = "4";          //speed
		document.getElementById("character_speed_display").value = "4"; 
		
		document.getElementById("character_strength_display").innerHTML = "4";       //strength
		document.getElementById("character_strength_display").value = "4";
		
		document.getElementById("character_luck_display").innerHTML = "2";           //luck
		document.getElementById("character_luck_display").value = "2"; 
		
		document.getElementById("character_intelligence_display").innerHTML = "2";   //intelligence
		document.getElementById("character_intelligence_display").value = "2";
		
		document.getElementById("character_chi_display").innerHTML = "3";            //chi		
		document.getElementById("character_chi_display").value = "3"; 		
		
		document.getElementById("character_stealth_display").innerHTML = "1";        //stealth
		document.getElementById("character_stealth_display").value = "1"; 
		
		/*document.getElementById("character_agility_display").innerHTML = "8";        //agility
		document.getElementById("character_agility_display").value = "8"; */			
		break;	
		
	case "006":
		choiceType = "Sambo";
		desc_txt = "Frigid hulk of a man. Can control the ice and withstand radiation after surviving Chernobyl. Bent on path of destruction since losing family in Chernobyl incident. Blames the world.";
		imageToShow.innerHTML = "<img src='../../images/avatars/sambo.jpg'>";
		document.getElementById("character_speed_display").innerHTML = "1";          //speed
		document.getElementById("character_speed_display").value = "1"; 
		
		document.getElementById("character_strength_display").innerHTML = "6";       //strength
		document.getElementById("character_strength_display").value = "6";
		
		document.getElementById("character_luck_display").innerHTML = "3";           //luck
		document.getElementById("character_luck_display").value = "3"; 
		
		document.getElementById("character_intelligence_display").innerHTML = "1";   //intelligence
		document.getElementById("character_intelligence_display").value = "1";
		
		document.getElementById("character_chi_display").innerHTML = "4";            //chi		
		document.getElementById("character_chi_display").value = "4"; 		
		
		document.getElementById("character_stealth_display").innerHTML = "1";        //stealth
		document.getElementById("character_stealth_display").value = "1"; 
		
		/*document.getElementById("character_agility_display").innerHTML = "8";        //agility
		document.getElementById("character_agility_display").value = "8"; */			
		break;
	case "002":
		choiceType = "MMA";
		desc_txt = "\Looking to master all styles to become best fighter.  All around good fighter,  well versed in various techniques and styles.";
		imageToShow.innerHTML = "<img src='../../images/avatars/mma.jpg'>";

		document.getElementById("character_speed_display").innerHTML = "3";          //speed
		document.getElementById("character_speed_display").value = "3"; 
		
		document.getElementById("character_strength_display").innerHTML = "3";       //strength
		document.getElementById("character_strength_display").value = "3";
		
		document.getElementById("character_luck_display").innerHTML = "2";           //luck
		document.getElementById("character_luck_display").value = "2"; 
		
		document.getElementById("character_intelligence_display").innerHTML = "2";   //intelligence
		document.getElementById("character_intelligence_display").value = "2";
		
		document.getElementById("character_chi_display").innerHTML = "3";            //chi		
		document.getElementById("character_chi_display").value = "3"; 		
		
		document.getElementById("character_stealth_display").innerHTML = "3";        //stealth
		document.getElementById("character_stealth_display").value = "3"; 
		
		/*document.getElementById("character_agility_display").innerHTML = "8";        //agility
		document.getElementById("character_agility_display").value = "8"; */			
		break;
	default:
		document.getElementById("character_strength_display").innerHTML = "0";
		document.getElementById("character_strength_display").innerHTML = "0";       //strength
		document.getElementById("character_intelligence_display").innerHTML = "0";   //intelligence
		document.getElementById("character_speed_display").innerHTML = "0";          //speed
		document.getElementById("character_stealth_display").innerHTML = "0";        //stealth
		/*document.getElementById("character_agility_display").innerHTML = "0";        //agility*/
		document.getElementById("character_luck_display").innerHTML = "0";           //luck
		document.getElementById("character_chi_display").innerHTML = "0";            //chi	
	}
	
	document.getElementById("description").innerHTML = "<b><u>"+choiceType+"</u></b>:<br/>"+desc_txt;

}

function validateCharacterName()
{
	var x = document.getElementById("txt_char_name");
	var msg = document.getElementById("display_msg");
	if(x.value == "")
	{			
		msg.innerHTML = "<p><font color='red'>enter a name</font><p>";
		return false;
	}

	else if(x.value.length < 3)	
	{
		msg.innerHTML = "<p><font color='red'>too short</font><p>";
		return false;
	}	

	else
	{
		msg.innerHTML = "";
		if(x.value.length >= 3)
		{
			msg.innerHTML = "<p><font color='green'>valid name<p>";
			return true;
		}
	}
 }

function validateCharacterTypeSelected()
{
	var x = document.getElementById("slct_char_type");
	if(x.value != "")
	{
		enableButtons();
		return true;
	}
	return false;
}

var remainingAttrPts = 5;
function validateAttributeDistribution()
{
	if(remainingAttrPts > 0)
		return false;
		
	return true;
}

function resetPoints()
{
	remainingAttrPts = 5;
	document.getElementById("atr_pts_remaining").innerHTML = remainingAttrPts.toString();
}

function toggleContinueBtn()
{	
	//if(validateCharacterName() && validateCharacterTypeSelected())
	if(validateCharacterTypeSelected() && validateAttributeDistribution())
		document.getElementById("btn_continue").disabled = false;
	else
		document.getElementById("btn_continue").disabled = true;
}

function updateElements(elementId, updateType)
{
	if(updateType == "add")
	{
		var element = document.getElementById(elementId);			
		var newVal = parseInt(element.value);
		newVal++;			
		console.log(newVal);
		remainingAttrPts--;
		console.log(remainingAttrPts+" left");
				
		document.getElementById(elementId).value = newVal.toString();
		document.getElementById(elementId).innerHTML = newVal.toString();
	}
	
	if(updateType == "subtract")
	{
		var element = document.getElementById(elementId);			
		var newVal = parseInt(element.value);
		newVal--;			
		console.log(newVal);
		remainingAttrPts++;
		console.log(remainingAttrPts+" remaining");
				
		document.getElementById(elementId).value = newVal.toString();
		document.getElementById(elementId).innerHTML = newVal.toString();
	}
}

function increaseAttributeVal(attributeType)
{
	var x = document.getElementById("atr_pts_remaining");
	if(remainingAttrPts > 0)
	{
		switch(attributeType)
		{
			case "btn_increase_strength":
				updateElements("character_strength_display", "add");
				break;
			case "btn_increase_intelligence":
				updateElements("character_intelligence_display", "add");
				break;
			case "btn_increase_speed":
				updateElements("character_speed_display", "add");
				break;	
			case "btn_increase_stealth":
				updateElements("character_stealth_display", "add");
				break;	
			/*case "btn_increase_agility":
				updateElements("character_agility_display", "add");
				break;*/	
			case "btn_increase_luck":
				updateElements("character_luck_display", "add");
				break;	
			case "btn_increase_chi":
				updateElements("character_chi_display", "add");
				break;					
			default:
				break;
		}
		var y = parseInt(x.innerHTML.trim());
		y--;
		console.log(y.toString());
		x.innerHTML = y.toString();
	}
	toggleContinueBtn();
}

function decreaseAttributeVal(attributeType)
{
	var x = document.getElementById("atr_pts_remaining");
	if(remainingAttrPts <= 5)
	{
		switch(attributeType)
		{
			case "btn_increase_strength":
				updateElements("character_strength_display", "subtract");
				break;
			case "btn_increase_intelligence":
				updateElements("character_intelligence_display", "subtract");
				break;
			case "btn_increase_speed":
				updateElements("character_speed_display", "subtract");
				break;	
			case "btn_increase_stealth":
				updateElements("character_stealth_display", "subtract");
				break;	
			case "btn_increase_agility":
				updateElements("character_agility_display", "subtract");
				break;	
			case "btn_increase_luck":
				updateElements("character_luck_display", "subtract");
				break;	
			case "btn_increase_chi":
				updateElements("character_chi_display", "subtract");
				break;					
			default:
				break;
		}
		var y = parseInt(x.innerHTML.trim());
		y++;
		console.log(y.toString());
		x.innerHTML = y.toString();
	}
	toggleContinueBtn();
}

function sendCreateRequest(speed, strength, luck, iq, chi, stealth)
{
	var charType = document.getElementById("slct_char_type");
	var request = new Object();
	request.action = "create_character";
	/*new*/
	request.speed = speed;
	request.strength = strength;
	request.luck = luck;
	request.intelligence = iq;
	request.chi = chi;
	request.stealth = stealth;
	/*end new*/
	request.characterType = charType.options[charType.selectedIndex].value;
	$.post("../build_character.php", request, sendCreateRequestCallback);
}

function sendCreateRequestCallback(data)
{
	console.log(data);
	$attemptResult = $.trim(data);
	if($attemptResult == "success")
		window.location.assign("../views/choose_location.php");	
	else
		alert("Error:"+data );
}
