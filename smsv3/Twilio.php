<?php
//session_destroy();
/*unset($_SESSION['storedsid']); 
unset($_SESSION['storedto']); 
unset($_SESSION['storedfrom']);
unset($_SESSION['storedbody']);;
unset($_SESSION['storeduri']);
unset($_SESSION['storeddirection']);
unset($_SESSION['storedstat']);*/
session_start();

require_once 'vendor/autoload.php';
//require 'jira.php';

$date = date("Y/m/d");
//print($date);
use Twilio\Rest\Client;

$sid    = "AC2abc2db6780b2615c558532a711bc9ad";
$token  = "0e70a16a89728299c29a055c21a09929";

$twilio = new Client($sid, $token);
$messages = $twilio->messages
                   ->read(array(
                              
                               "dateSent" => new \DateTime($date)
                          )
                   );
 $count = 0;
foreach ($messages as $record) {	

		if ($count ==0) {
			$storedsid = $record->sid;
			$storedto = $record->to;
			$storedfrom = $record->from;
			$storeddirection = $record->direction;
			$storedbody = $record->body;
			$storeduri = $record->uri;
			$storedstat =  $record->status;

			if($storedstat == "received")
			{
				
				$_SESSION['storedsid'] = $storedsid;
				$_SESSION['storedto'] = $storedto;
				$_SESSION['storedfrom'] = $storedfrom;
				$_SESSION['storedbody'] = $storedbody;
				$_SESSION['storeduri'] = $storeduri;
				$_SESSION['storeddirection'] = $storeddirection;
				$_SESSION['storedstat'] = $storedstat;
				$url = "jira.php";
				header( 'Location: '. $url);
				exit();
			}
			$count++;
			//print($count);
	}
	$count =0;

}
 ?>