<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
$sid    = "AC2abc2db6780b2615c558532a711bc9ad";
$token  = "0e70a16a89728299c29a055c21a09929";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+639497675017", // to
                           array(
                               "body" => "This is test",
                               "from" => "+15627741055"
                           )
                  );

print($message->sid);
/*
$teststring = "add";
$url = "https://saratel.atlassian.net/rest/api/2/issue";
$username = "gabriel.alforque@anaca.com.au";
$password = "154263789aA";
$txt = '{
    "fields": {
        "project": {
            "key": "TESTSW"
        },
        "summary": "PHP TO JIRA",
        "description": "navigate and testing for PHP to JIRA PHP TESTT",
        "issuetype": {
            "name": "Service Request"
        }
    }
}';

// Create a new cURL resource
$ch = curl_init ();

// Set URL and other appropriate options
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $txt );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_USERPWD, $username . ":" . $password );

$headers = array ();
$headers [] = "Content-Type: application/json";
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );

// Grab URL and pass it to the browser
$result = curl_exec ( $ch );

echo $result;

*/
?>

