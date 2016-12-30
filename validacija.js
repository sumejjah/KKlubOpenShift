function validirajPricu()
{
	var x = document.forms["posaljiPricu"]["ime"].value;
	var por = document.getElementById("poruka");
	if (x == null || x == "." || x == " " || x == "") 
	{
        por.innerHTML = "Niste unijeli ime!";
		return false;
    }
	
	//x = document.forms["posaljiPricu"]["email"].value;
	
	x = document.forms["posaljiPricu"]["message"].value;
	if(x == null || x == "" || x == " ")
	{
		por.innerHTML = "Nema price!";
		return false;
	}
		
}

function validirajLogIn()
{
	var x = document.forms["posaljiPricu"]["ime"].value;
	var por = document.getElementById("poruka");
	if (x == null || x == "." || x == " " || x == "") 
	{
        por.innerHTML = "Niste unijeli ime!";
		return false;
    }
		
	x = document.forms["posaljiPricu"]["password"].value;
	if(x == null || x == "" || x == " ")
	{
		por.innerHTML = "Pasword nije uredu.";
		return false;
	}
		
}

function validirajPitanje()
{
	var x = document.forms["formaPitanje"]["ime"].value;
	var por = document.getElementById("poruka");
	if(x.length < 3)
	{
		por.innerHTML = "Nije ime uneseno!";
		return false;
	}
	var x = document.forms["formaPitanje"]["pitanje"].value;
	if(x.length < 10)
	{
		por.innerHTML = "Pitanje mora imati minimalno 10 karaktera.";
		return false;
	}
}

var map;
function initMap() 
{
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 43.9972877, lng: 18.1745222},
          zoom: 8
        });
		
}