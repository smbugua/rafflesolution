<?php
include('header.php');
$id=$_REQUEST['drawid'];
$drawqueryresults=mysql_fetch_array(mysql_query("SELECT quantity,name,prize from draw where id='$id'"));
//check if draws have been ran

$no=$drawqueryresults['quantity'];
$name=$drawqueryresults['name'];
$prize=$drawqueryresults['prize'];

$winnerquery=mysql_query("SELECT * FROM winner where campaign='$name'");
$rowno=mysql_num_rows($winnerquery);
if ($rowno<=0) {

//Random draw query
for ($i=1; $i <=$no ; $i++) { 
	$results=mysql_query("SELECT DISTINCT e.customername as name ,e.tel as tel ,e.raffleno as raffleno ,e.idno as idno , e.id as id  FROM `entries` e LEFT JOIN winner w on w.tel=e.tel WHERE e.tel not in (SELECT w.tel from winner w  ) GROUP BY e.customername  ORDER by rand() limit 1");
	while($row=mysql_fetch_array($results)) {
//set variables
//$campaign=$name;
$entryid=$row['id'];
$cname=$row['name'];
$tel=$row['tel'];
$idno=$row['idno'];
$raffleno=$row['raffleno'];

//echo test
//echo $entryid." ".$name." ".$tel." ".$idno." ".$raffleno." <br >" ;

//insert into winners table

mysql_query("INSERT INTO winner(campaign,entryid,name,tel,idno,raffleno,prize)VALUES('$name','$entryid','$cname','$tel','$idno','$raffleno','$prize')");


	}
	
}
	echo "<script>alert('Success $name has been Executed!') </script>";
	echo "<script>location.replace('draw.php')</script>";
}elseif ($rowno>0) {
echo "<script>alert('Error $name has already been Executed!') </script>";
echo "<script>location.replace('draw.php')</script>";
}


?>



