function createRequest(str)
{
	if (window.XMLHttpRequest)
		xmlhttp=new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari		 
	else
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
  
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("main_container").innerHTML=xmlhttp.responseText;
			console.log("Successfully received "+str+".php");
		}
			
	}
		
		xmlhttp.open("GET",str+".php",true);
		xmlhttp.send();
}
		
		
			
function fetchPage(str)
{
	if (str=="")
	{
		//document.getElementById("display").innerHTML="Please enter a request.";
		alert('Cant submit a blank request!');
	} 
	else
	{
		console.log("Requesting "+str+".php from the server..");
		
		if(!createRequest(str))
		{
			document.getElementById("main_container").innerHTML="<p><h2><font color='white'>The requested script:</font><font color='red'> "+str+".php</font><font color='white'> cannot be found!</font></h2></p>";
		}
		
	}	
}

function goPage(str)
{
	if (str=="")
	{
		//document.getElementById("display").innerHTML="Please enter a request.";
		alert('Cant submit a blank request!');
	} 
	else
	{
		window.location.assign(str+".php");
	}
}