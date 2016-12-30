<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galerija slika</title>
    <link rel="stylesheet" type="text/css" href="meni.css">
  <link rel="stylesheet" type="text/css" href="dropbtn.css">
  <link rel="stylesheet" type="text/css" href="stilSlike.css">
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

<div class="carouselbox">
  <div class="buttons">
    <button class="prethodni">
       ◀ <span class="naEkranu">Prethodna</span>
    </button>
    <button class="sljedeca">
      <span class="naEkranu">Sljedeca</span> ▶ 
    </button>
  </div>
  <ol class="sadrzaj">
    <li><img class="slika" src="1.jpg" alt="1"></li>
    <li><img class="slika" src="2.jpg" alt="2"></li>
    <li><img class="slika" src="3.jpg" alt="3"></li>
    <li><img class="slika" src="4.jpg" alt="4"></li>
    <li><img class="slika" src="5.jpg" alt="5"></li>
    <li><img class="slika" src="6.jpg" alt="6"></li>
    <li><img class="slika" src="7.jpg" alt="7"></li>
    <li><img class="slika" src="8.jpg" alt="8"></li>
</ol>
</div>
	<script src="prikazSlika.js" defer></script>

</body>
</html>
