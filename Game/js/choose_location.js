function showDefaultImg()
{
	var x = document.getElementById('location_img');
	console.log(x);
	x.style.backgroundSize = "100% 100%";
	x.style.backgroundImage = "url('../../images/locations/earth.jpg')";
}

function displayImg(selectedLoc)
{
	var x = document.getElementById('location_img');
	console.log(x);
	x.style.backgroundSize="100% 100%";
	//console.log(selectedLoc);

	switch(selectedLoc)
	{
		case 'africa':
			//x.style.backgroundImage = "url('../../images/locations/africa.jpg')";
			x.innerHTML = "<img width='100%' src='../../images/locations/africa.jpg'>";
			break;
	
		case 'australia':
			//x.style.backgroundImage = "url('../../images/locations/australia.jpg')";
			x.innerHTML = "<img width='100%' src='../../images/locations/australia.jpg'>";
			break;
	
		case 'asia':
			//x.style.backgroundImage = "url('../../images/locations/asia.jpg')";
			x.innerHTML = "<img width='100%' src='../../images/locations/asia.jpg'>";
			break;
	
		case 'antartica':
			//x.style.backgroundImage = "url('../../images/locations/antartica.jpg')";
			x.innerHTML = "<img width='100%' src='../../images/locations/antartica.jpg'>";
			break;
	
		case 'europe':
			//x.style.backgroundImage = "url('../../images/locations/europe.jpg')";
			x.innerHTML = "<img width='100%' src='../../images/locations/europe.jpg'>";
			break;
	
		case 'north_america':
			//x.style.backgroundImage = "url('../../images/locations/north_america.jpg')";
			x.innerHTML = "<img width='100%' src='../../images/locations/north_america.jpg'>";
			break;
	
		case 'south_america':
			//x.style.backgroundImage = "url('../../images/locations/south_america.jpg')";
			x.innerHTML = "<img width='100%' src='../../images/locations/south_america.jpg'>";
			break;
		
		default:
			x.innerHTML= "An image could not be found for "+selectedLoc+"!";
			break;
	}
}

function directToFight(str)
{
	window.location.assign("battle_view.php?continent_id="+str);
}