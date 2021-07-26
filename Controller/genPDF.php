<?php

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

include('../fpdf181_PDFgen/fpdf.php');

$quoteID = $_POST['quoteID'];
$jobCategory = $_POST['jobCategory'];
$serviceType = $_POST['serviceType'];
$serviceTime = $_POST['serviceTime'];
$servicePrice = $_POST['servicePrice'];
$customerUsername = $_POST['customerUsername'];
$customerFirstName = $_POST['customerFirstName'];
$customerLastName = $_POST['customerLastName'];
$customerEmail = $_POST['customerEmail'];
$customerPhone = $_POST['customerPhone'];

$quoteStatus = pdfQuoteStatus($quoteID);


class PDF extends FPDF{
// Page header
    function Header()
    {
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(15,15,'QuoteSystem - Invoice',0,0,'C');
        // Line break
        $this->Ln(20);
        // Horizontal Line
        $this->Line(20, 25, 210-20, 25);
        // Line break
        $this->Ln(10);
    }

// Page footer
    function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(20);
$pdf->SetRightMargin(20);
$pdf->SetFont('Times','U',16);
$pdf->Cell(0,10,'Quote Details',0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'QuoteID:'. " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " .$quoteID,0,1,'L');
$pdf->Cell(0,10,'Job Category:'. " " . " " . " " . " " . " " . " " .$jobCategory,0,1,'L');
$pdf->Cell(0,10,'Service Type:'. " " . " " . " " . " " . " " . " " .$serviceType,0,1,'L');
$pdf->Cell(0,10,'Service Time:'. " " . " " . " " . " " . " " . " " .$serviceTime,0,1,'L');
$pdf->Cell(0,10,'Service Price:'. " " . " " . " " . " " . " " . " " .$servicePrice,0,1,'L');
$pdf->Cell(0,10,'Quote Status:'. " " . " " . " " . " " . " " . " " . " " .$quoteStatus,0,1,'L');
$pdf->Cell(0,10,'Legend: A = Approved, P = Pending, D = Declined        (Quote Status)',0,1,'L');
$pdf->Line(20,125,210-20,125);
$pdf->Ln(10);
$pdf->SetFont('Times','U',16);
$pdf->Cell(0,10,'Customer Details',0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Customer Username:'. " " . " " . " " . " " . " " . " " .$customerUsername,0,1,'L');
$pdf->Cell(0,10,'Customer First Name:'. " " . " " . " " . " " . " " .$customerFirstName,0,1,'L');
$pdf->Cell(0,10,'Customer Last Name:'. " " . " " . " " . " " . " " .$customerLastName,0,1,'L');
$pdf->Cell(50,10,'Customer Email:'. " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " .$customerEmail,0,1,'L');
$pdf->Cell(50,10,'Customer Phone:'. " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " . " " .$customerPhone,0,1,'L');
$pdf->Line(20,200,210-20,200);
$pdf->Ln(30);
$pdf->Cell(0,10,'Quote finalisation is to be within 5 working days of the approval',0,1,'C');
$pdf->Cell(0,5,'Payments are to be made within 5 working days after finalisation',0,1,'C');
$pdf->Ln(15);
$pdf->Cell(0,5,'Thank you for using QuoteSystem',0,1,'C');
$pdf->Output();






