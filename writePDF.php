<html>
<head>
<title>Create PDF file</title>
</head>
<body>
<?php
	require('fpdf.php');
    //$pdf = new FPDF();
	//$pdf=new FPDF('L','mm','A4');
	$pdf=new FPDF( 'P' , 'mm' , 'A4' );
	$pdf->AddPage();
	$pdf->SetFont('Times','B',16);
	
	$pdf->Cell(0,10,'Welcome to create PDF file',0,1);
	$pdf->Cell(0,50,'test set page zzzz',0,1,"C");
	$pdf->Cell(0,50,'Version 2012 by top',0,1,"C");
	// พิมพ์ข้อความลงเอกสาร 
$pdf->Cell( 0  , 5 , iconv( 'UTF-8','cp874' , 'center typing' ) , 0 , 1 , 'R' );
    $pdf->Cell(0,5,'xxxxxxxxxx  test by top',0,1);
 
// พิมพ์ข้อความลงเอกสาร  มีกรอบด้วย
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'Center typing agin' ) , 1 );
 
// พิมพ์ข้อความลงเอกสาร  มีกรอบ พารามิเตอร์ระบุอย่างนี้ก็ได้
$pdf->Cell( 50  , 5 , iconv( 'UTF-8','cp874' , 'my Center' ) , 'TBR' );
	
	
	$pdf->Output("MyPDF/receipt.pdf","F");
?>
	PDF Created Click <a href="MyPDF/receipt.pdf">here</a> to Download
</body>
</html>