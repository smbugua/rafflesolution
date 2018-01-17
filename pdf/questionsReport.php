<?php require_once('../Connections/conn.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
  $webAdminNo= $_SESSION['userId'];
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
       if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
//mysql_select_db($database_conn, $conn);
//"SELECT type, COUNT(name) FROM products GROUP BY type"; 
$query_Products = "SELECT discussion.subjectNo, subject.subjectName, COUNT(discussionNo) FROM discussion, subject WHERE subject.subjectNo=discussion.subjectNo GROUP BY discussion.subjectNo ORDER BY COUNT(discussionNo)DESC ";
$Products = mysql_query($query_Products, $conn) or die(mysql_error());
$row_Products = mysql_fetch_assoc($Products);
$totalRows_Products = mysql_num_rows($Products);

?>
<?php
define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

class PDF extends FPDF
{
//Page header
function Header()
{
	$this->Image('images/logoPdf.jpg',35);
	$this->Ln();
		$this->SetFont('Times','B',20);
		$this->SetFillColor(255);
//		$this->SetTextColor(0,0,255);
		$this->Cell(280, 6, 'FORUM QUESTIONS REPORT', 0, 0, 'C', 1);
		$this->Ln();
		$this->Ln();
		//Colors, line width and bold font
		$this->SetFillColor(0,100,100);
		$this->SetTextColor(255);
		$this->SetDrawColor(100,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('Times','B',15);
		//Header
		$header=array('Subject','No. of Questions per Subject');
		$w=array(40,70);
		$this->Cell(15);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
		$this->Ln();
		//Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');	
}
}
//Page footer
function Footer()
{
	$this->SetY(-15);			// Position at 1.5 cm from bottom
	$this->SetFont('Arial','I',8);		// Arial italic 8
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');	// Page number
}


//Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

//$result=mysql_query($StockDetails);


do {
	$pdf->Cell(55, 6, $row_Products['subjectName'], 1, 0, 'L', 0);
	$pdf->Cell(20, 6, $row_Products['COUNT(discussionNo)'], 1, 0, 'L', 0);
	$pdf->Ln();
} while($row_Products = mysql_fetch_assoc($Products));
$pdf->Output();
mysql_free_result($Products);
?>
