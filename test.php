<?php

if(!isset($argv[1])) {
   echo "First Arg MISSING\n";
}
if(!isset($argv[2])) {
   echo "Second Arg MISSING\n";
}
if(!isset($argv[3])) {
   echo "Third Arg MISSING\n";
}

require('ArtikCloudProxy.php');
$proxy = new ArtikCloudProxy();

//////$proxy->setAccessToken('7a315c19c7064eb2be327e83eb37b57a');
//////$messageCount = 1000;
//$response = $proxy->getMessagesLast(ArtikCloudProxy::DEVICE_ID, $messageCount);

////////$response = $proxy->getMessagesSpec(ArtikCloudProxy::DEVICE_ID, $messageCount, $argv[1], $argv[2], $argv[3]);
//header('Content-Type: application/json');

//echo json_encode($response);

//$FIle = $argv[3] . ".json";

//$myfile = fopen($FIle, "w") or die("Unable to open file!");

//fwrite($myfile, json_encode($response));
//fclose($myfile);


?>
