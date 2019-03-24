<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
$sid    =$sid;
$token  =$token;
$twilio = new Client($sid, $token);
//retrieve message
$messages = $twilio->messages
                   ->read(array(
                              "dateSent" => new \DateTime('2019-3-12'),
                              
                          )
                   );
    //filter
	$count =0;
	$storedsid;
	$storedto;
	$storedfrom;
	$storedbody;
	$storeduri;
	foreach ($messages as $record) {	

		if ($count ==0) {
			$storedsid = $record->sid;
			$storedto = $record->to;
			$storedfrom = $record->from;
			$storedbody = $record->body;
			$storeduri = $record->uri;
		}
	
			$count++;
			//print("Count: ".$count);

	}
	$count =0;

	//print($storedsid);
	//print($storedto);
	//print($storedfrom);
	//print($storedbody);
	//print($storeduri);

	   //REST API connecto JIRA
	        $username = "gabriel.alforque@anaca.com.au";
			$password = "154263789aA";

			$base64_usrpwd = base64_encode($username.':'.$password);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://saratel.atlassian.net/rest/api/2/issue');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '.$base64_usrpwd)); 
			
			$arr['project'] = array( 'key' => 'TESTSW');
			$arr['summary'] = "API TEST";
			$arr['description'] = "Number: To".$storedto . "Body: " . $storedbody;
			$arr['issuetype'] = array( 'name' => "Service Request");
			
			$json_arr['fields'] = $arr;
			
			$json_string = json_encode ($json_arr);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$json_string);
			$result = curl_exec($ch);
			curl_close($ch);
			
			//echo $result;
?>
