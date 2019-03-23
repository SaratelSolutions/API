<?php
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;
if (isset($_POST['submit'])) {
$tosend = $_POST['number'];
$sendingmessage = $_POST['message'];

// Find your Account Sid and Auth Token at twilio.com/console
$sid    = "ACdaa38dc6514b23f8c987c3d059b09806";
$token  = "83f5dbf6bb6a5b996e92aaef7911857f";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create($tosend, // to
                           array(
                               "body" => $sendingmessage,
                               "from" => "+18582164734"
                           )
                  );
/*if($message->sid)
{
	echo "Message sent successfully!.";
}*/
print($message->sid);
}
 
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<head>
	<meta charset="utf-8">
	<title> Testing SMS, PHP with twillio
	</title>
</head>
<body>
	<div class="message-box">
		<h1>Message Here</h1>
		<img src="css/img/txt.png" class=avatar>
		<form action="" method="post">
			<p>Number</p>
			<input type="text" name="number" placeholder="Enter the Number">
			<P>Message</P>
			<input type="text" name="message" placeholder="Enter the Message">
			<p><input type="submit" name="submit" value="Send Message"> </p>
		</form>
	</div>

</body>
</html>
