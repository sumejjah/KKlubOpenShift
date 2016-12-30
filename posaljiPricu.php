<!DOCTYPE html>
<html>
<head>
  <META name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="prica.css">
  <link rel="stylesheet" type="text/css" href="meni.css">
  <link rel="stylesheet" type="text/css" href="dropbtn.css">
  <script type="text/javascript" src="validacija.js"></script>
  <script type="text/javascript" src="localstorage.js"></script>
</head>

<body onload="ucitaj()">
</body>
<?php
session_start();
if(isset($_SESSION['loggedin'])){
	print "<form action='login.php' method='POST'><input name='logout' type='submit' value='Logout' id='login'></form>";
	print "<p id='login'>".$_SESSION['username']."je logovan";
}
else{
	print "<form action='login.php' method='POST'><input name='loginPopuni' type='submit' value='Login' id='login'></form>";
}

if(isset($_REQUEST['komentarisi'])){
	$_SESSION['komentarErr']="";
	$ime = htmlspecialchars($_REQUEST['ime']);
	$mail = htmlspecialchars($_REQUEST['email']);
	$kom = htmlspecialchars($_REQUEST['message']);
	
	if(strlen($ime)<3) {
		$_SESSION['komentarErr']='Naziv mora biti duži od 3 slova.';
		print "<p>GREŠKA:".$_SESSION['komentarErr']."</p>";
		}
		
	if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['komentarErr'] = "Invalid email format"; 
	}
	
	if(strlen($kom)<10) {
		$_SESSION['komentarErr']='Komentar mora biti imati minimalno 10 znakova.';
		print "<p>GREŠKA:".$_SESSION['komentarErr']."</p>";
		}
	
	$podaci = simplexml_load_file('komentari.xml');
	if(!isset($_SESSION['komentarErr']) || $_SESSION['komentarErr']==""){
		$child = $podaci->addChild("link");
		$child->addChild("autor", $ime);
		$child->addChild("mail", $mail);
		$child->addChild("komentar", $kom);
		
		$podaci->asXML("komentari.xml");
	}
}

?>
<div class="meni">
  <div class="kolona prazno"></div>
  <div class="kolona pet"><a href="zadaca.php">O nama</a></div>
  <div class="kolona pet"><a href="ponuda.php">Ponuda</a></div>
  <div class="dropdown">
	<button class="dropbtn">Iskustva</button>
  <div class="dropdown-content">
    <a href="posaljiPricu.php">Recenzije</a>
    <a href="ocjena.php">Anketa</a>
    <a href="pretragaKomentara.php" id="peti">Pretraga</a>
  </div>
</div>
  <div class="kolona pet"><a href="carousel.php">Galerija</a></div>
  <div class="kolona pet"><a href="kontakt.php">Kontakt</a></div>
</div>

<div class="red">
<form action="posaljiPricu.php" method="post" name="posaljiPricu" class="formaPrica" onsubmit="return validirajPricu();">
    <h1>
        <span>Napišite komentar.</span>
    </h1>
    <label>
        <span>Ime:</span>
        <input id="name" type="text" name="ime" placeholder="Puno ime"/>
    </label>

    <label>
        <span>Email :</span>
        <input id="email" type="email" name="email" placeholder="Email" required/>
    </label>

    <label>
        <span>Komentar :</span>
        <textarea id="message" name="message" placeholder="Vaše iskustvo"></textarea>
    </label>

     <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Pošalji" name="komentarisi" onclick="spremi()"/>
    </label>
	<label>
	<span>&nbsp;</span>
	<p name="poruka" id="poruka"></p>
	</label>
</form>
</div>

</html>
