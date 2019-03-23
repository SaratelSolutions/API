<<?php 

$url = "recieve.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, "var = test");


$result = curl_exec($ch);
echo curl_exec($ch);
print $result;
echo "1";

 ?>