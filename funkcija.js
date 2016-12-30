var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function(){
	if (ajax.readyState == 4 && ajax.status == 200)
		{	
			document.getElementById("polje").innerHTML = ajax.responseText;
			var script = document.createElement('script');
			script.src = 'js/localstorage.js';
			script.onload = function(){};
			document.head.appendChild(script);
			
			var script2 = document.createElement('script');
			script2.src = 'js/prikazSlika.js';
			script2.onload = function(){};
			document.head.appendChild(script2);
			
			var script3 = document.createElement('script');
			script3.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDcHLszbnnW9rbQLu5r2FjXgkhRWZIHBb8&callback=initMap';
			script3.onload = function(){};
			document.head.appendChild(script3);
		}
		if(ajax.readyState == 4 && ajax.status == 404)
		document.getElementById("polje").innerHTML == "Greska: nepoznat URL..."
}

function prikaziSadrzaj(naziv){
	ajax.open("GET", naziv, true);
	ajax.send();
	return true;
}
