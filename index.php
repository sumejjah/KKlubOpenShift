<!DOCTYPE HTML>
<html>
<HEAD>
  <META name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="meni.css">
  <link rel="stylesheet" type="text/css" href="dropbtn.css">
  <link rel="stylesheet" type="text/css" href="mi.css">
  <script type="text/javascript" src="localstorage.js"></script>
  <script type="text/javascript" src="prikazSlika.js"></script>
  <script type="text/javascript" src="validacija.js"></script>
</HEAD>

<BODY>
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
    <div class="kolona dva naslov">Konjički klub "Visoko"</div>
  </div>

  <div class="red">
    <div class="kolona dva">Klub je osnovan na inicijativu
      nekoliko ljubitelja konja i jahanja 2007. godine, a
      zvanično registrovan 2008. godine.

      U početku je tu bilo nekoliko vlasnika grla koji su zajedno jahali i razmjenjivali iskustva sa vlasnicima iz čitave BiH, a nakon par godina rada i djelovanja ta ljubav se
      proširila na preko stotinu članova i ljubitelja konja. </div>
      <div class="kolona dva slikaONama"></div>
  </div>

<!--
<div id="polje"></div> -->
</BODY>
</html>
