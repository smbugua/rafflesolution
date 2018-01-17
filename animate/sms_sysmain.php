<?php
include('connect.php');
$prize=$_POST['prize'];    
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twillio/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC113452ba4e043e9e6da9ad23748e2613';
$token = 'e8e3d4395fd9e5ac61e42aa8f5c3b63b';
$client = new Client($sid, $token);
    
    
    //GENERATE CODE FOR EDIT REQUESTS
    $code=rand(1000,9999);
    $date=date('Y-m-d');
    mysql_query("INSERT INTO requests(code,expire)VALUES('$code','$date')");
    $row=mysql_fetch_assoc(mysql_query("SELECT id FROM draws WHERE datescheduled='$date'"));
    // Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+254728641712',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+13159391418',
        // the body of the text message you'd like to send
        'body' => "Hello Johnstone...Draw run AUTHTOKEN: ".$code." .Gen by Galleria Shopping Mall Raffle Sys"
    )
);
    // Use the client to do fun stuff like send text messages!
/*$client->messages->create(
    // the number you'd like to send the message to
    '+254722269790',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+13159391418',
        // the body of the text message you'd like to send
        'body' => "Hello Salma...Draw run AUTHTOKEN: ".$code." .Gen by Galleria Shopping Mall Raffle Sys"
    )
);*/
// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+254728944815',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+13159391418',
        // the body of the text message you'd like to send
        'body' => "Hello Techcube...Draw run AUTHTOKEN: ".$code." .Gen by Galleria Shopping Mall Raffle Sys"
    )
);
    echo "<script>location.replace('drawmain.php?prize=$prize')</script>";

?>
