<html>
<head>
	<link rel="stylesheet" type="text/css" href="tabelaK.css">
	<link rel="stylesheet" type="text/css" href="meni.css">
	<link rel="stylesheet" type="text/css" href="dropbtn.css">
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
</body>
</html>
<?php
if(isset($_REQUEST['pretrazi'])){
	$unos = $_REQUEST['unos'];
	
	$xmlDoc=new DOMDocument();
$xmlDoc->load("komentari.xml");

$x=$xmlDoc->getElementsByTagName('link');

$q=$unos;
$odgovor=0;
if (strlen($q)>0) {
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('autor');
    $z=$x->item($i)->getElementsByTagName('komentar');
    if ($y->item(0)->nodeType==1) {
      //vrsimo pretragu po autoru i komentaru 
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
		    $odgovor=1;
        print "<table>";
		print "<TR>";
		$s = "Autor: ".$y->item(0)->childNodes->item(0)->nodeValue;
		print "<TD>$s</TD></TR>";
		$kom = "Komentar: ".$z->item(0)->childNodes->item(0)->nodeValue;
		print "<TD>$kom</TD>";
		print "</TR>";
		print "</table>"; 
      }
    }
  }
}

//ako nema odgovora
if($odgovor == 0)
	echo "Nema rezultata!";
}
?>