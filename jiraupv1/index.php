<?php
//$teststring = "add";
$url = "https://saratel.atlassian.net/rest/api/2/issue/TESTSW-108";
$username = "gabriel.alforque@anaca.com.au";
$password = "************";
$txt = '{
     "update": {

        "summary": [{
         "set" :  "OK"
        }],

        "description": [{
          "set" : "testing again."
        }],
         "comment": [
         {
             "add": {
                "body": "Bug has been fixed?."
             }
         }
         ]
    }
    
}';

// Create a new cURL resource
$ch = curl_init ();

// Set URL and other appropriate options
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $txt );
//curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_USERPWD, $username . ":" . $password );

$headers = array ();
$headers [] = "Content-Type: application/json";
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );

// Grab URL and pass it to the browser
$result = curl_exec ( $ch );

echo $result;
?>
