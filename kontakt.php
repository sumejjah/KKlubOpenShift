<!DOCTYPE html>
<html>
<head>
  <title>Konjicki klub "Visoko"</title>
  <META name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="mapa.css">
    <link rel="stylesheet" type="text/css" href="meni.css">
  <link rel="stylesheet" type="text/css" href="dropbtn.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcHLszbnnW9rbQLu5r2FjXgkhRWZIHBb8&callback=initMap" async defer></script>  
	<script src="validacija.js"></script>
</head>

<body>
<?php
session_start();
if(isset($_SESSION['loggedin'])){
	print "<form action='login.php' method='POST'><input name='logout' type='submit' value='Logout' id='login'></form>";
	print "<p id='login'>".$_SESSION['username']."je logovan";
}
else{
	print "<form action='login.php' method='POST'><input name='loginPopuni' type='submit' value='Login' id='login'></form>";
}
?>

<div class="meni">
  <div class="kolona prazno"></div>
  <div class="kolona pet"><a href="index.php">O nama</a></div>
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

  <div class="lokacija"><p>Kako doci do nas?<p></div>

  <div class="map" id="map"></div>
  
    <div class="red">
      <div class="kolona dva lijevo">
        <h3>Radno vrijeme</h3>
          <div>15:00 - 18:30</div>
          <div id="napomena">Ukoliko zelite zakazati cas, potrebno
            je izvrsiti rezervaciju minimalno dan ranije.</div>
          <div>Zbog prirode nasih aktivnosti, desava se da se
            nismo u mogucnosti javiti na telefon. Molimo Vas da
            nam u takvim situacijama posaljete SMS poruku i nase
            osoblje ce Vam uzvratiti poziv u najkracem mogucem roku.</div>
            <div id="napomena">Kontak telefon : +38762 530 530</div>
            <div>Sarajevska bb, Stara kasarna "Ahmet Fetahagic", 71300 Visoko,</div>
      </div>
      <div class="kolona dva">
        <!--forma za pitanja-->
        <form action="" class="formaPitanje" name="formaPitanje" onsubmit="return validirajPitanje();">
          <h3>Postavite pitanje</h3>
          <label>
            <input id="ime" type="text" name="ime" placeholder="Ime i prezime"/>
          </label>
          <label>
            <input id="email" type="email" name="email" pattern="[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" placeholder="Email" required/>
          </label>
          <label>
            <input id="telefon" type="text" name="telefon" pattern="[0-9]*" placeholder="Broj telefona" required/>
          </label>
          <label>
            <textarea id="pitanje" name="pitanje" placeholder="Pitanje?"></textarea>
          </label>

          <label>
            <input type="submit" class="button" value="Posalji pitanje"/>
          </label>
		  <label>
			<p id="poruka" name="poruka"></p>
		  </label>
        </form>
      </div>
    </div>

</body>
</html>
