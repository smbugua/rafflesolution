<?php
include('../connect.php');
$query=mysql_fetch_assoc(mysql_query("SELECT * FROM  requests ORDER BY ID DESC LIMIT 1"));
$code=$query['code'];

?>
<link rel="stylesheet" type="text/css" href="animate.css">
    <!-- CORE CSS-->    
<link href="bootstrap.css" rel="stylesheet">


<div class="container">
  <div class="row">
  <svg viewBox="0 0 960 300">
    <symbol id="s-text">
    <text text-anchor="middle" x="50%" y="80%"> Galleria Draw </text>
  </symbol>

  <g class = "g-ants">
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
  </g>
</svg>
  </div>
    
    <div class="row" align="center">
    <form method="post" action="sys/execute.php">
    <input type="text" value="<?php echo $code?>" id="id" class="hidden">
    <input type="text" name="code"  id="code" required="">
    <br>  <br>
    <button class="btn btn-success" onclick="check()" >CONTINUE</button>
        </div></form>
    </div>
</div>
<script>
 
var bodyElement = document.querySelector("body");
 
var requestAnimationFrame = window.requestAnimationFrame || 
                            window.mozRequestAnimationFrame || 
                            window.webkitRequestAnimationFrame || 
                            window.msRequestAnimationFrame;
 
var delay = 0;
 
function changeColor() {
    delay++;
     
    if (delay > 20) {
        bodyElement.style.backgroundColor = getRandomColor();
        delay = 0;
    }
 
    requestAnimationFrame(changeColor);
}
changeColor();           
 
function getRandomColor() {
    // creating a random number between 0 and 255
    var r = Math.floor(Math.random()*256);
    var g = Math.floor(Math.random()*256);
    var b = Math.floor(Math.random()*256);
     
    // going from decimal to hex
    var hexR = r.toString(16);
    var hexG = g.toString(16);
    var hexB = b.toString(16);
     
    // making sure single character values are prepended with a "0"
    if (hexR.length == 1) {
        hexR = "0" + hexR;
    }
     
    if (hexG.length == 1) {
        hexG = "0" + hexG;
    }
 
    if (hexB.length == 1) {
        hexB = "0" + hexB;
    }
 
    // creating the hex value by concatenatening the string values
    var hexColor = "#" + hexR + hexG + hexB;
    return hexColor.toUpperCase();
}

function check(){
var id= document.getElementById("id").value;
var id2=document.getElementById("code").value;
if (id2!=id) {
    window.alert('Wrong Code');
    window.reload();
}


}

</script>