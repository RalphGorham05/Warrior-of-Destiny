function postLoginCredentials(idInputElement, pwInputElement)
{
	var userName = document.getElementById(idInputElement).value;
	var userPassword = document.getElementById(pwInputElement).value;
	
	var request = new Object();
	request.action = "login_user";
	request.username = userName;
	request.password = userPassword;
	
	$.post("../../php/login_scripts/login.php", request, returnLoginCallback);
}

function postLoginCallback(data)
{
	
}