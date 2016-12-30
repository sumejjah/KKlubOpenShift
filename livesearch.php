<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("komentari.xml");

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  $brojac = 0;
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('autor');
    $z=$x->item($i)->getElementsByTagName('komentar');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
		  $brojac = $brojac + 1;
        if ($hint=="") {
          $hint="<p>" . 
          $y->item(0)->childNodes->item(0)->nodeValue." ". 
          $z->item(0)->childNodes->item(0)->nodeValue . "</p>";
        } else {
          $hint=$hint . "</br><p>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . 
          $z->item(0)->childNodes->item(0)->nodeValue . "</p>";
        }
		if($brojac >= 10){
			break;
		}
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>