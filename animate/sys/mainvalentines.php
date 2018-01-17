<?php
include('../../connect.php');
//$date = date('Y-m-d');
$date=date('Y-m-d');
//$draw = mysql_fetch_array(mysql_query("SELECT * FROM draw WHERE status='0' ORDER BY id ASC LIMIT 1"));
//$section = $draw['name'];
//$prize = $_POST['prize'];
$e = 'VALENTINES2017-02-28';
$result = mysql_query("SELECT DISTINCT * FROM entries  WHERE promo='VALENTINES2017' && passport!='N/A' && passport!='' && tel NOT IN(SELECT tel FROM winnervalentines) GROUP BY RAND()LIMIT 1");
    while ($row = mysql_fetch_array($result)) {

//RUN INSERT
        $a = $row['customername'];
        $b = $row['tel'];
        $c = $row['passport'];
        $idno = $row['idno'];
        $d = $row['raffleno'];
        $cust = mysql_fetch_array(mysql_query("SELECT DISTINCT id FROM customer WHERE tel='$b' || passport='$c'"));
        $entryid = $cust['id'];

        // mysql_query("INSERT INTO winner(campaign,name,tel,idno,raffleno,weeklylevel,datedrawn,prize)VALUES('$e','$a','$b','$c','$d','1','$date','$p')");

        mysql_query(" INSERT INTO winnervalentines(campaign,name,tel,idno,raffleno,grandlevel,datedrawn,prize,sponsor,entryid,prizetype,issued) 
 VALUES ( '$e','$a','$b','$c','$d','1','$date','$500','TWIGA TOURS ACCOMODATION PARIS 3 NIGHTS','$entryid','4' ,'1 COUPLE')");
          mysql_query(" INSERT INTO winnervalentines(campaign,name,tel,idno,raffleno,grandlevel,datedrawn,prize,sponsor,entryid,prizetype,issued) 
 VALUES ( '$e','$a','$b','$c','$d','1','$date','$1700','KENYA AIRWAYS RETURN AIR TICKET TO PARIS FRANCE','$entryid','5','1 COUPLE' )");

    }
//QUERY INSERTS
    //$winners = mysql_query("SELECT * FROM winner where campaign='$e' ORDER BY id DESC LIMIT 20");


    ?>
 <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>GALLERIA DRAW</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="dist/jquery.slotmachine.css" type="text/css" media="screen"/>

        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
                crossorigin="anonymous"></script>
        <script type="text/javascript" src="dist/jquery.slotmachine.js"></script>

    </head>

    <!-- Slot machine example -->
    <div id="casino" style="padding-top:50px;">
        <div class="content">
            <h1>RUN VALENTINES 2017 PROMOTION DRAW</h1>

            <div>
                <div id="casino1" class="slotMachine" style="margin-left: -65px;">
                    <div class="slot slot1"></div>
                    <div class="slot slot2"></div>
                    <div class="slot slot3"></div>
                    <div class="slot slot4"></div>
                    <div class="slot slot5"></div>
                    <div class="slot slot6"></div>
                </div>

                <div id="casino2" class="slotMachine">
                    <div class="slot slot1"></div>
                    <div class="slot slot2"></div>
                    <div class="slot slot3"></div>
                    <div class="slot slot4"></div>
                    <div class="slot slot5"></div>
                    <div class="slot slot6"></div>
                </div>

                <div id="casino3" class="slotMachine">
                    <div class="slot slot1"></div>
                    <div class="slot slot2"></div>
                    <div class="slot slot3"></div>
                    <div class="slot slot4"></div>
                    <div class="slot slot5"></div>
                    <div class="slot slot6"></div>
                </div>

                <div class="btn-group btn-group-justified btn-group-casino" role="group">
                    <div id="slotMachineButtonShuffle" type="button" class="btn btn-primary btn-lg">Run Draw!</div>
                    <div id="slotMachineButtonStop" type="button" class="btn btn-primary btn-lg">Stop!</div>
                    <a type="button" href="valzresult4.php" class="btn btn-primary btn-lg">Results</a>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
    <script>
        $(document).ready(function () {
            var machine4 = $("#casino1").slotMachine({
                active: 0,
                delay: 500
            });

            var machine5 = $("#casino2").slotMachine({
                active: 1,
                delay: 500
            });

            machine6 = $("#casino3").slotMachine({
                active: 2,
                delay: 500
            });

            var started = 0;

            $("#slotMachineButtonShuffle").click(function () {
                started = 3;
                machine4.shuffle();
                machine5.shuffle();
                machine6.shuffle();
            });

            $("#slotMachineButtonStop").click(function () {
                switch (started) {
                    case 3:
                        machine4.stop();
                        break;
                    case 2:
                        machine5.stop();
                        break;
                    case 1:
                        machine6.stop();
                        break;
                }
                started--;
            });
        });
    </script>


    <footer>
        <div class="content">
            <div id="textMachine" style="text-align: center">
                <div>GALLERIA SHOPPING MALL!</div>
                <div>TO PARIS WITH LOVE!</div>
                <div><?php echo date('Y')?>!</div>
            </div>
            <script>
                $(document).ready(function () {
                    $("#textMachine").slotMachine({
                        active: 1,
                        delay: 450,
                        auto: 1500
                    });
                });
            </script>
        </div>
    </footer>

    </body>
    </html>


<?php //} ?>