<?php
    
    if (file_exists('usluge.xml'))  
    {
        $xml = simplexml_load_file('usluge.xml'); 
        $x = 1;
        $v = [];

        $header = array('Naziv', 'Trajanje', 'Cijena');

        $csvFile = fopen('usluge.csv', 'w');
        fputcsv($csvFile, $header);      
        fclose($csvFile);

        $result = $xml->xpath('//usluga'); // The xpath method searches the SimpleXML node for children matching the XPath path.

        foreach ($result as $r) 
        {           
            $child = $xml->xpath('//usluga['.$x .']/*');      

            foreach ($child as $value) {
                $v[] = $value;         
            }

            // Upisivanje vrijednosti za 1 red
            $csvFile = fopen('usluge.csv', 'a');
            fputcsv($csvFile, $v);      
            fclose($csvFile);  

            $v = []; // Oslobađanje niza 
            $x++; // Idi na sljedeći <usluga> tag
        }

        $contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('usluge.csv') . "\";");
        readfile('usluge.csv');
        exit();
    }
?>