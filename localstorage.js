function spremi()
{
	if(typeof(Storage) != "undefined"){
		ime = document.getElementById("name").value;
		email = document.getElementById("email").value;
		prica = document.getElementById("message").value;
		
		localStorage.setItem("imeKorisnika", ime);
		localStorage.setItem("emailKorisnika", email);
		localStorage.setItem("iskustvo", prica);
		}
	else{
		document.getElementById("poruka").innerHTML = "Zao nam je, Vas pretrazivac ne podrzava web storage...";
	}
}

function ucitaj()
{
	sacuvanoIme = localStorage.getItem("imeKorisnika");
	sEmail = localStorage.getItem("emailKorisnika");
	sPrica = localStorage.getItem("iskustvo");
	if(sacuvanoIme){
		document.getElementById("name").value = sacuvanoIme;
		document.getElementById("email").value = sEmail;
		document.getElementById("message").value = sPrica;
	}
}