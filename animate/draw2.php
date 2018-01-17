<?php

// PHP Slots Script by Jonesy44 //
// http://www.hawkee.com        //

session_start();

echo '<style>
      #slots {
        border: 1px solid green;
        background: lightgreen url(\'slots.jpg\'); 
        padding: 10px;
        width: 200px; 
        text-align:left;
      }
      #gborder {
        border: 1px solid green;
        background: lightgreen; 
        padding: 10px;
        width: 200px; 
        text-align:center;
      }
      #rborder {
        border: 1px solid red;
        background: pink; 
        padding: 10px;
        width: 200px; 
        text-align:center;
      }
      #border {
        border: 1px solid orange;
        background: white; 
        padding: 10px;
        width: 200px; 
        text-align:center;
      }
      </style>';

function playSlots() {
  $r1 = rand(0,9);
  $r2 = rand(0,9);
  $r3 = rand(0,9);
  echo '<div id="slots"><h1>&nbsp;&nbsp;&nbsp;' .$r1. ' &nbsp;&nbsp;&nbsp;&nbsp; ' .$r2. ' &nbsp;&nbsp;&nbsp; ' .$r3. '</h1></div>';
  if ($r1 == $r2) {
    if ($r2 == $r3) {
      echo '<div id="gborder">Complete win!<br><b> + $2000</b></div>';
      $_SESSION["slots"] = $_SESSION["slots"] + 2000;
    }
    else {
      echo '<div id="gborder">First two!<br><b> + $250</b></div>';
      $_SESSION["slots"] = $_SESSION["slots"] + 250;
    }
  }
  elseif ($r2 == $r3) {
    if ($r1 != $r2) {
      echo '<div id="gborder">Second two!<br><b> + $250</b></div>';
      $_SESSION["slots"] = $_SESSION["slots"] + 250;
    }
  }
  elseif ($r1 == $r3) {
    echo '<div id="gborder">First and last!<br><b> + $250</b></div>';
    $_SESSION["slots"] = $_SESSION["slots"] + 250;
  }
  else {
    echo '<div id="rborder">You Lose!<br><i> - $100</i></div>';
    $_SESSION["slots"] = $_SESSION["slots"] - 100;
  }
}

if ($_GET["play"]) {
  if (!isset($_SESSION["slots"])) {
    $_SESSION["slots"] = 1000;
  }
  echo '<center>';
  playSlots();
  echo '<br><form action=' .$_SERVER['PHP_SELF']. ' method=get>';
  echo '<input type=hidden name=play value=slots>
        <input type=submit value="Spin Wheels!">
        </form>';
}
else {
  echo '<form action=' .$_SERVER['PHP_SELF']. ' method=get>';
  echo '<input type=hidden name=play value=slots>
        <input type=submit value="Play Slots!">
        </form>';
  exit();
}
echo '<div id="border">Cash: $' .$_SESSION["slots"]. '<hr><a href=http://wfs.myartsonline.com><i>PHP Slots Script By Jonesy44</a> - <a href=http://www.hawkee.com>Hawkee.com</a><hr></div>';
echo '</center>';

?>