<html>
<head>
<title>Create PDF file</title>
</head>
<body>
<?php
    $name  = "Somebody";
	$amount = "2,000,000";
	$charity= "Charity";
	$deceased ="somebody";
	$partnerName="Human Ressources Officer ";
	$regNo="TH002012";
	require('fpdf.php');
    //$pdf = new FPDF();
	$pdf=new FPDF('P','mm','A4');
	//$pdf=new FPDF( 'L' , 'mm' , 'A4' );
	$pdf->AddPage();
	//$pdf->Image('imgs/logo.gif',50,10,70);
	//$pdf->Image('imgs/logo.gif',x,y,w,h);
	$pdf-> Image('imgs/logo.gif',20,10,15,15,'gif','1');
	//Set Address for your company
	$pdf->SetFont('Times','',15);
	$pdf->Text(5, 40 , '31-33 Tower Road');	
	$pdf->Text(5, 45 , 'Boscombe');
	$pdf->Text(5, 50 , 'Bournemouth');
	$pdf->Text(5, 55 , 'Dorset BH4 1LA');
	$pdf->Text(5, 65 , 'Tel: (01202) 394340');
	$pdf->Text(5, 75 , 'www.harrytomes.com');
	$pdf->Text(5, 80 , 'contactus@harrytomes.com');
	// Set  for your details.
	$pdf->SetFont('Times','B',15);
	$pdf->Cell(0,55,'Donation Receipt',0,1);
	$pdf->SetFont('Times','',15);
	$pdf->Cell(0,15,'Dear  '.$name.',',0,1);
	
	$pdf->Cell(0,20,'Thank you for you kind donation of '.$amount.' to '.$charity,0,1,"L");
	
	$pdf->Cell(0,1,'memory of '.$deceased.'.',0,1,"L");
	$pdf->Cell(0,22,'This letter will serve as you receipt for tax purposes and certify that',0,1);
	$pdf->Cell(0,1,'you did not receive any goods or services for your donation.',0,1);
	$pdf->Cell(0,24,'Thank you for your kind and generous support. Details of your',0,1);
	$pdf->Cell(0,1,'donation will be passed to the family.',0,1);
	$pdf->Cell(0,26,'Yours sincerely,',0,1);
	
	$pdf->Cell(0,28,$partnerName,0,1);
	$pdf->Cell(0,1,'Date received 		  :    '.date("D d F Y h:i:s"),0,1);
	$pdf->Cell(0,10,'Amount       		  :    '.$amount,0,1);
	$pdf->Cell(0,1,'Charity Name 		  :    '.$charity,0,1);
	$pdf->Cell(0,10,'Registration Number  :    '.$regNo,0,1);
	
	$pdf->Output("MyPDF/receipt.pdf","F");
?>
	PDF Created Click <a href="MyPDF/receipt.pdf">here</a> to Download
</body>
</html>