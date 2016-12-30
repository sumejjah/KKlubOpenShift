<html>
<head>
  <META name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="meni.css">
  <link rel="stylesheet" type="text/css" href="dropbtn.css">
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}

</script>
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
<form action="rezultatiPretrage.php" method="POST" id="formaPretraga">
<input id="unos" name="unos" type="text" size="35" onkeyup="showResult(this.value)">
<input type="submit" name="pretrazi" id="pretrazi" value="Pretraži">
<!--<a href="rezultatiPretrage.php"><img src="images/search.png" alt="Pretraga" height="72" width="62"></a> -->
<div id="livesearch"></div>
</form>

<form action="ispisiKomentare.php" method="POST">
	<input type="submit" id="ispisiKomentara" name="pretrazi" value="Ispis svih komentara" >
</form>

</body>
</html>