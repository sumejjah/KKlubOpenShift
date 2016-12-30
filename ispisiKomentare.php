<html>
<head>
	<link rel="stylesheet" type="text/css" href="meni.css">
	<link rel="stylesheet" type="text/css" href="dropbtn.css">
	<link rel="stylesheet" type="text/css" href="tabelaK.css">
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
<?php
$xml=simplexml_load_file('komentari.xml');

foreach($xml->link as $u){
	print "<table>";
	print "<TR>";
	$s = "Autor: ".$u->autor;
	print "<TD>$s</TD></TR>";
	$kom = "Komentar: ".$u->komentar;
	print "<TD>$kom</TD>";
	print "</TR>";
	print "</table>"; 

}
?>
</body>
</html>