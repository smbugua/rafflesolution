<?php
include('header.php');
$id=$_REQUEST['id'];
$code=mysql_fetch_array(mysql_query("SELECT id,code from verify where status='0' and id='$id' order by id desc limit 1"));
$c=$code['code'];


if ($_POST) {
 $entry=$_POST['code'];
 if ($entry!=$c) {
  echo"<script>alert('Invalid Code! Conatct Administrator ')</script>";
   echo "<script>location.replace('verify.php')</script>";
 }elseif ($entry=$c) {
   mysql_query("UPDATE verify set status='1' where id='$id'");
   echo "<script>location.replace('draw.php')</script>";
 }
}
