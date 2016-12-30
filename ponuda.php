<!DOCTYPE HTML>
<HTML>
<head>
  <META name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="usluge.css">
  <link rel="stylesheet" type="text/css" href="meni.css">
  <link rel="stylesheet" type="text/css" href="dropbtn.css"></head>

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

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	$podaci = simplexml_load_file('usluge.xml');
//dodavanje 
if(isset($_REQUEST['dodavanje'])){
	$_SESSION['ponudaErr']="";
	$naziv = htmlspecialchars($_REQUEST['naziv']);
	$trajanje = htmlspecialchars($_REQUEST['trajanje']);
	$cijena = htmlspecialchars($_REQUEST['cijena']);
	
	if(strlen($naziv)<3) {
		$_SESSION['ponudaErr']='Naziv aktivnosti mora biti duži od 3 slova.';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
		
	if(strlen($trajanje)<3) {
		$_SESSION['ponudaErr']='Naziv trajanja aktivnosti mora biti duži od 3 slova i prvi znak mora biti broj';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
		
	if(is_numeric(substr($trajanje, 0, 1))==false) {
		$_SESSION['ponudaErr']='Prvi znak trajanja mora biti broj!';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
	if(is_numeric(substr($cijena, 0, 1))==false) {
		$_SESSION['ponudaErr']='Prvi znak cijene mora biti broj!';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
			
	if(!isset($_SESSION['ponudaErr']) || $_SESSION['ponudaErr']==""){
		$child = $podaci->addChild("usluga");
		$child->addChild("naziv", $naziv);
		$child->addChild("trajanje", $trajanje);
		$child->addChild("cijena", $cijena);
		
		$podaci->asXML("usluge.xml");
	}
	
	
}
//brisanje
if(isset($_REQUEST['brisanje'])){
	$naziv = htmlspecialchars($_REQUEST['naziv']);
	$trajanje = htmlspecialchars($_REQUEST['trajanje']);
	$cijena = htmlspecialchars($_REQUEST['cijena']);
	$red = $_REQUEST['red'];
	
	$dom = new DOMDocument();
	$dom->preserveWhiteSpace = false;
	$dom->load('usluge.xml');
	$usluge = $dom->getElementsByTagName('usluga');
	
	$br=1;
	foreach($usluge as $u){
		if($br == $red){
			$u->parentNode->removeChild($u);
		}
		$br = $br + 1;
	}
	$dom->save('usluge.xml');
}

//mijenjanje
if(isset($_REQUEST['mijenjanje'])){
		$_SESSION['ponudaErr']="";
		$podaci = simplexml_load_file('usluge.xml');

		$naziv = htmlspecialchars($_REQUEST['naziv']);
		$trajanje = htmlspecialchars($_REQUEST['trajanje']);
		$cijena = htmlspecialchars($_REQUEST['cijena']);
		$red = $_REQUEST['red'];
					
		if(strlen($naziv)<3) {
		$_SESSION['ponudaErr']='Naziv aktivnosti mora biti duži od 3 slova.';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
		
	if(strlen($trajanje)<3) {
		$_SESSION['ponudaErr']='Naziv trajanja aktivnosti mora biti duži od 3 slova i prvi znak mora biti broj';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
		
	if(is_numeric(substr($trajanje, 0, 1))==false) {
		$_SESSION['ponudaErr']='Prvi znak trajanje mora biti broj!';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
	if(is_numeric(substr($cijena, 0, 1))==false) {
		$_SESSION['ponudaErr']='Prvi znak cijene mora biti broj!';
		print "<p>GREŠKA:".$_SESSION['ponudaErr']."</p>";
		}
		
		if(!isset($_SESSION['ponudaErr']) || $_SESSION['ponudaErr']==""){
		$br = 1;
		foreach ($podaci->children() as $up) {
			
			if($br == $red){ //napravila sam samo za ime, dodati za ostale elemente
				$up->naziv = $naziv;
				$up->trajanje = $trajanje;
				$up->cijena = $cijena;
			}
			$br = $br + 1;
		}
		file_put_contents("usluge.xml", $podaci->saveXML());
		}
}

$podaci = simplexml_load_file('usluge.xml');
print "<h1>Ponuda</h1>";
print "<table>";
print "<TR><TH>Naziv</TH><TH>Trajanje</TH><TH>Cijena</TH></TR>";
$br = 0;
foreach($podaci->usluga as $u){
	$br = $br + 1;
	print "<TR><form action='ponuda.php' method='POST'>";
	print "<TD><input type='text' name='naziv' value='".$u->naziv."'></TD>";
	print "<TD><input type='text' name='trajanje' value='".$u->trajanje."'></TD>";
	print "<TD><input type='text' name='cijena' value='".$u->cijena."'></TD>";
	print "<TD><input type='hidden' name='red' value='".$br."'><input type='submit' name='brisanje' value='-'> <input type='submit' name='mijenjanje' value= 'E'></TD>";
	print "</form></TR>";
}

print "</table>";  
 print "<table>";
 print "<TR><form action='ponuda.php' method='POST'><TD><input type='text' name='naziv'> <input type='text' name='trajanje'> <input type='text' name='cijena'> <input type='submit' name='dodavanje' value='+'></TD></form></TR>";
 print "</table>";
 if(isset($_REQUEST['downloadCSV'])){
	header("Location: downloadCSV.php");
}
print "</br>";
print "<form><input type='submit' name='downloadCSV' value='Download'></form>"; 
print "</br>";
}
else{
	$podaci = simplexml_load_file('usluge.xml');
print "<h1>Ponuda</h1>";
print "<table>";
print "<TR><TH>Naziv</TH><TH>Trajanje</TH><TH>Cijena</TH></TR>";
$br = 0;
foreach($podaci->usluga as $u){
	$br = $br + 1;
	print "<TR><form action='ponuda.php' method='POST'>";
	print "<TD><input type='text' name='naziv' value='".$u->naziv."'></TD>";
	print "<TD><input type='text' name='trajanje' value='".$u->trajanje."'></TD>";
	print "<TD><input type='text' name='cijena' value='".$u->cijena."'></TD>";
	print "</form></TR>";
}

print "</table>"; 

}
if(isset($_REQUEST['pdfIspis'])){
	print "ovo je pdf!";
	header("Location: izvjestajpdf.php");
}
print "<form><input type='submit' name='pdfIspis' value='Printaj'></form>";

?>


</body>
</html>
