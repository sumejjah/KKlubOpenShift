<?php
require("fpdf.php");

class PDF extends FPDF
{
    function Header()
    {
        //logo konjickog kluba
        $this->Image('logo2.png', 85, 6, 40);
        $this->SetFont('Times', 'B', 20);
        $this->Cell(30, 40, 'Ponuda', 0, 0);
    }

    function Footer()
    {
        $this->SetY(-15); 
        $this->SetFont('Times','I', 10);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function BasicTable($header, $data)
    {
        // Header
        $this->SetX(10);
        foreach($header as $col){
            $this->SetFont('Times', 'B', 12);
            $this->Cell(40, 58, $col, 0);
        }
        $this->Ln();
        
        // Data
        $this->SetY(45);
        $this->SetFont('Times', '', 12);
        foreach($data as $row)
        {
            foreach($row as $col){
                $this->Cell(41, 8, $col, 0, 0);
            }
            $this->Ln();
        }
    }

}


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 12);
    $header = array('Naziv', 'Trajanje', 'Cijena');
    $xml = simplexml_load_file('usluge.xml');
    $pdf->BasicTable($header, $xml);
    $pdf->SetX(15);
    $pdf->SetY(40);
    $pdf->Output();
?>