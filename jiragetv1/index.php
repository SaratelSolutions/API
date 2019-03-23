<?php
$teststring = "add";
$url = "https://saratel.atlassian.net/rest/api/2/issue/TESTSW-102";
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
//curl_setopt ( $ch, CURLOPT_POSTFIELDS, $txt );
//curl_setopt ( $ch, CURLOPT_POST, false );
curl_setopt ( $ch, CURLOPT_USERPWD, $username . ":" . $password );

$headers = array ();
$headers [] = "Content-Type: application/json";
curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );

// Grab URL and pass it to the browser
//$json_string = json_encode ($ch);
$result = curl_exec ($ch);

//$json_string = json_encode ($result);
echo $result;
//echo $json_string;
?>