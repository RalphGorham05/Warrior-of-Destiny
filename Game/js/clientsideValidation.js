function validateRegistration(userPw, confirmPw)
{
	if(userPw.length > 0)
	{
		if(userPw == confirmPw)
		{
			document.getElementById('pw_match_status').innerHTML = "<img src='../images/check.png'/>";
			document.getElementById('cont_registration').disabled = false;
		}
		else
		{
			document.getElementById('pw_match_status').innerHTML = "<img src='../images/red_x.png'/>";
			document.getElementById('cont_registration').disabled = true;
		}	
	}
	else
	{
		document.getElementById('pw_match_status').innerHTML = "";
		document.getElementById('cont_registration').disabled = true;
	}
}



function resetStatus()
{
	if(document.getElementById('pw_confirmation').value.length > 0)
	{
		document.getElementById('pw_match_status').innerHTML = "";
		document.getElementById('cont_registration').disabled = true;
	}
	
}

function clearInputs()
{
	var fields = document.getElementsByTagName('input'),
    length = fields.length;
	
	while (length--) 
	{
		if (fields[length].type === 'text' || fields[length].type === 'password')  
			fields[length].value = ''; 
	}
}