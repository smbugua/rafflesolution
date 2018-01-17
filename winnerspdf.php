<?php 
ob_start();
require_once('header.php');
$e = $_REQUEST['drawid'];
$draw=mysql_fetch_array(mysql_query("SELECT * from draw where id='$e'"));
$name=$draw['name'];
$query_Products = "SELECT * from winner where campaign='$name' ORDER BY id ASC ";
$Products = mysql_query($query_Products) or die(mysql_error());
$row_Products = mysql_fetch_assoc($Products);
$totalRows_Products = mysql_num_rows($Products);
?>
<?php
define('FPDF_FONTPATH', 'fonts/');
require('fpdf.php');
class PDF extends FPDF
{
//Page header
function Header()
{
	$this->Image('images/logo.png',5);
	$this->Ln();
		$this->SetFont('Arial','B',10);
		$this->SetFillColor(255);
//		$this->SetTextColor(0,0,255);
		$this->Cell(200, 6,'SHOP AND WIN GALLERIA SHOPPING MALL CHRISTMAS PROMOTION.', 0, 1, 'C', 1);
		$this->Ln();
		$this->Cell(200, 6,'15TH NOVEMBER 2017-15TH JANUARY 2018.', 0, 1, 'C', 1);
		$this->Ln();
		$this->Cell(200, 6,'PRIZE SCHEDULE.', 0, 1, 'C', 1);
		$this->Ln();
	
		//$this->Ln();
		//Colors, line width and bold font
		$this->SetFillColor(222,184,135);
		$this->SetTextColor(255);
		$this->SetDrawColor(100,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('Arial','B',8);
		//Header

		$header=array('Description','Type/Model','Unit Value','Issued','Winner','ID/Passport No','Receipt Serial','Signature');
		$w=array(60,40,15,20,40,20,35,35);
		$this->Cell(5);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
		$this->Ln();
		//Color and font restoration
		$this->SetFillColor(222,184,135);
		$this->SetTextColor(0);
		$this->SetFont('');	
}
}
//Page footer
function Footer()
{
	$this->SetY(-15);			// Position at 1.5 cm from bottom
	$this->SetFont('Arial','I',8);		// Arial italic 8

$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,1,'C');
		$this->Ln();
		$this->Cell(200, 6,'15TH NOVEMBER 2017-15TH JANUARY 2018 PRIZE SCHEDULE.', 0, 1, 'C', 1);

	// Page number
}//Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
$no=81;
do {
	//$pdf->Cell(5, 6,$no++ ,1 , 0,'L');
	$pdf->Cell(5, 6,$row_Products['id'] ,1 , 0,'L');
	$pdf->Cell(60, 6,$name ,1 , 0,'L');
	$pdf->Cell(40, 6,'GALLERIA GIFT VOUCHER' ,1 , 0,'L');
	$pdf->Cell(15, 6, $row_Products['prize'], 1, 0, 'L');
	$pdf->Cell(20, 6, '1', 1, 0, 'L');
	$pdf->Cell(40, 6, $row_Products['name'], 1, 0, 'L');
	$pdf->Cell(20, 6, $row_Products['idno'], 1, 0, 'L');
	$pdf->Cell(35, 6, $row_Products['raffleno'], 1, 0, 'L');
	$pdf->Cell(35, 6, '', 1, 0, 'L');
	
	$pdf->Ln();
} while($row_Products = mysql_fetch_assoc($Products));
ob_end_clean();
$pdf->Output();
mysql_free_result($Products);
ob_end_flush();
?>
